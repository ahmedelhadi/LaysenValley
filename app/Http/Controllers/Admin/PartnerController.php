<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Livewire\Admin\Reports\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Auth;
use Session;
use Redirect;
use Image;

use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;

use App\Models\Partner;
use App\Models\Page;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partnersQuery = Partner::query();

        if ($request->has('trashed')) {
            $partnersQuery = $partnersQuery->onlyTrashed();
        }
        $partners = $partnersQuery->paginate(50);

        return view('admin.partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::where('is_active',1)->get();
        return view('admin.partners.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnerRequest $request)
    {
        //Requests
        $requests = $request->all();

        //logo
        if (isset($requests['logo'])) {
            $requests['logo'] = $this->uploadImage($requests['logo']);
        }


        if (isset($requests['icon'])) {
            $requests['icon'] = $this->uploadImage($requests['icon']);
        }


        $partner = Partner::create($requests);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.create_success'));

        return redirect()->to(route('admin.partners.index'));

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
        $partner = Partner::findOrFail($id);
        $pages = Page::where('is_active',1)->get();
        return view('admin.partners.edit',compact('partner','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnerRequest $request, $id)
    {
        //Requests
        $requests = $request->all();

        //logo
        if (isset($requests['logo'])) {
            $requests['logo'] = $this->uploadImage($requests['logo']);
        }

        if (isset($requests['icon'])) {
            $requests['icon'] = $this->uploadImage($requests['icon']);
        }


        
        $partner = Partner::findOrFail($id);
        $partner = $partner->update($requests);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));

        return redirect()->to(route('admin.partners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        
        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect()->to(route('admin.partners.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $partner = Partner::withTrashed()->find($id);

        $partner->forceDelete();

        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect(route('admin.partners.index'));
    }


    /**
     * Restore the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $partner = Partner::withTrashed()->find($id);

        $partner->restore();

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.restore_success'));

        return redirect(route('admin.partners.index'));
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

    public function projects($id){
        $partner = Partner::find($id);
        if($partner->kind_id==2){
            $projects = $partner->projects;
            return view('admin.partners.projects',compact('partner','projects'));
        }else{
            $partnerid = $partner->id;
            $projects = Project::whereHas('company', function ( $query) use($partnerid) {
                $query->where('id', $partnerid);
            })->get();
            // dd($company_projects);
            return view('admin.partners.projects',compact('partner','projects'));

        }
        //->projects->sortBy(['sort'=>'desc']);
       // return $projects;
        // return view('admin.partners.projects',compact('partner'));
    }
}
