<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Auth;
use Session;
use Redirect;
use Image;

use App\Http\Requests\Gallery\StoreGalleryRequest;
use App\Http\Requests\Gallery\UpdateGalleryRequest;

use App\Models\GalleryItem;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Log;


class GalleryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $galleryitemsQuery = Galleryitem::query();

        if ($request->has('trashed')) {
            $galleryitemsQuery = $galleryitemsQuery->onlyTrashed();
        }

        if ($request->has('page_id')) {
            $page_id = $request->page_id;

            $galleryitemsQuery = $galleryitemsQuery->whereHas('pages', function ($query) use ($page_id)  {
                $query->where('page_id',$page_id);
    
            });
        }

        $galleryitems = $galleryitemsQuery->paginate(10);

        return view('admin.galleryitems.index',compact('galleryitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::where('is_active',1)->get();
        return view('admin.galleryitems.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryitemRequest $request)
    {
        //Requests
        $requests = $request->all();

        //image
        if (isset($requests['image'])) {
            $requests['image'] = $this->uploadImage($requests['image']);
        }

        //Create Slug
        $requests['slug']  = Str::slug($requests['title']['ar']);

        $galleryitem = Galleryitem::create($requests);

        $page = Page::findorfail($request->page_id);

        $page->galleryitems()->sync($galleryitem->id);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.create_success'));

        return redirect()->to(route('admin.galleryitems.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleryitem = Galleryitem::findOrFail($id);
        $pages = Page::where('is_active',1)->get();

        return view('admin.galleryitems.edit',compact('galleryitem','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryitemRequest $request, $id)
    {
        //Requests
        $requests = $request->all();

        //image
        if (isset($requests['image'])) {
            $requests['image'] = $this->uploadImage($requests['image']);
        }

        //$requests['slug']  = Str::slug($requests['title']['ar']);

        $galleryitem = Galleryitem::findOrFail($id);
        $galleryitem = $galleryitem->update($requests);
        $galleryitem = Galleryitem::findOrFail($id);

        $page = Page::findorfail($request->page_id);
        $page->galleryitems()->sync($galleryitem->id);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));

        return redirect()->to(route('admin.galleryitems.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $galleryitem = Galleryitem::findOrFail($id);
        $galleryitem->delete();
        
        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect()->to(route('admin.galleryitems.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $galleryitem = Galleryitem::withTrashed()->find($id);

        $galleryitem->forceDelete();

        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect(route('admin.galleryitems.index'));
    }


    /**
     * Restore the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $galleryitem = Galleryitem::withTrashed()->find($id);

        $galleryitem->restore();

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.restore_success'));

        return redirect(route('admin.galleryitems.index'));
    }

    /**
     * uploading and resize image.
     *
     */

    public function uploadImage($file)
    {
        $destinationPath = 'uploads';
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        Image::make($file)
            ->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'. $fileName);

        return $destinationPath.'/'.$fileName;
    }
}
