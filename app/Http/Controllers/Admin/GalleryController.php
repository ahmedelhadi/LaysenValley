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

use App\Models\Gallery;
use App\Models\Page;
use App\Models\Log;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $galleriesQuery = Gallery::query();

        if ($request->has('trashed')) {
            $galleriesQuery = $galleriesQuery->onlyTrashed();
        }

        if ($request->has('page_id')) {
            $page_id = $request->page_id;

            $galleriesQuery = $galleriesQuery->whereHas('pages', function ($query) use ($page_id)  {
                $query->where('page_id',$page_id);
    
            });
        }

        $galleries = $galleriesQuery->paginate(10);

        return view('admin.galleries.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::where('is_active',1)->get();
        return view('admin.galleries.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        //Requests
        $requests = $request->all();

        //image
        if (isset($requests['image'])) {
            $requests['image'] = $this->uploadImage($requests['image']);
        }

        //Create Slug
        $requests['slug']  = Str::slug($requests['title']['ar']);

        $gallery = Gallery::create($requests);

        $page = Page::findorfail($request->page_id);

        $page->galleries()->sync($gallery->id);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.create_success'));

        return redirect()->to(route('admin.galleries.index'));

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
        $gallery = Gallery::findOrFail($id);
        $pages = Page::where('is_active',1)->get();

        return view('admin.galleries.edit',compact('gallery','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, $id)
    {
        //Requests
        $requests = $request->all();

        //image
        if (isset($requests['image'])) {
            $requests['image'] = $this->uploadImage($requests['image']);
        }

        //$requests['slug']  = Str::slug($requests['title']['ar']);

        $gallery = Gallery::findOrFail($id);
        $gallery = $gallery->update($requests);
        $gallery = Gallery::findOrFail($id);

        $page = Page::findorfail($request->page_id);
        $page->galleries()->sync($gallery->id);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));

        return redirect()->to(route('admin.galleries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        
        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect()->to(route('admin.galleries.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $gallery = Gallery::withTrashed()->find($id);

        $gallery->forceDelete();

        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect(route('admin.galleries.index'));
    }


    /**
     * Restore the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $gallery = Gallery::withTrashed()->find($id);

        $gallery->restore();

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.restore_success'));

        return redirect(route('admin.galleries.index'));
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