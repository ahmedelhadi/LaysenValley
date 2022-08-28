<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Auth;
use Session;
use Redirect;
use Image;

use App\Http\Requests\Inquiry\StoreInquiryRequest;
use App\Http\Requests\Inquiry\UpdateInquiryRequest;

use App\Models\Inquiry;
use App\Models\Log;


class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inquiriesQuery = Inquiry::query();

        if ($request->has('trashed')) {
            $inquiriesQuery = $inquiriesQuery->onlyTrashed();
        }


        if ($request->has('block_id')) {
            $block_id = $request->block_id;

            $inquiriesQuery = $inquiriesQuery->where('attributable_type','App\Models\Block')->where('attributable_id',$block_id);
        }


        $inquiries = $inquiriesQuery->paginate(10);

        return view('admin.inquiries.index',compact('inquiries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inquiries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInquiryRequest $request)
    {
        //Requests
        $requests = $request->all();

        //image
        if (isset($requests['image'])) {
            $requests['image'] = $this->uploadImage($requests['image']);
        }

        //Create Slug
        $requests['slug']  = Str::slug($requests['title']['ar']);

        $inquiry = Inquiry::create($requests);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.create_success'));

        return redirect()->to(route('admin.inquiries.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        return view('admin.inquiries.show',compact('inquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        return view('admin.inquiries.edit',compact('inquiry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInquiryRequest $request, $id)
    {
        //Requests
        $requests = $request->all();

        //image
        if (isset($requests['image'])) {
            $requests['image'] = $this->uploadImage($requests['image']);
        }

        //$requests['slug']  = Str::slug($requests['title']['ar']);

        $inquiry = Inquiry::findOrFail($id);
        $inquiry = $inquiry->update($requests);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));

        return redirect()->to(route('admin.inquiries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();
        
        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect()->to(route('admin.inquiries.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $inquiry = Inquiry::withTrashed()->find($id);

        $inquiry->forceDelete();

        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect(route('admin.inquiries.index'));
    }


    /**
     * Restore the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $inquiry = Inquiry::withTrashed()->find($id);

        $inquiry->restore();

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.restore_success'));

        return redirect(route('admin.inquiries.index'));
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

