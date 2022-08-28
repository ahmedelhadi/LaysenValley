<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Str;

use Auth;
use Session;
use Redirect;
use Image;

use App\Models\Project;
use App\Models\Partner;
use App\Models\Subject;
use App\Models\Interest;
use App\Models\Country;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::user()->hasCompleteProfile()) {
            Session::flash('status', __('admin.info'));
            Session::flash('message', __('lang.update_your_profile'));
            return redirect()->to(route('dashboard.profile.setting'));
        }


        $user_id = Auth::user()->id;
        
        $projects = Project::query();

        $projects->whereHas('partner', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->orwhereHas('company', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->orwhereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        });



        $projects->orwhere('employee_id', $user_id);

        $projects = $projects->latest()->paginate(20);

        // dd(Auth::user()->pendingProjects());
        //return redirect()->to(route('dashboard.projects.index'));
        return view('dashboard.index',compact('projects'));
    }

    
    
    public function statistics()
    {
        return view('dashboard.statistics.index');
    }

    
    public function profile()
    {
        return view('dashboard.profile.index');
    }

    /**
     * profile function.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting()
    {
        return view('dashboard.profile.setting');
    }



    /**
     * profileUpdate function.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(UpdateUserRequest $request)
    {
        
        //Requests
        if (!$request->password) {
            $requests = $request->except('password');
        }else {
            $requests = $request->all();
            $requests['password'] = bcrypt(request('password'));
        }

        //image
        if (isset($requests['avatar'])) {
            $requests['avatar'] = $this->uploadImage($requests['avatar']);
        }

        $user = Auth::user();
        $user = $user->update($requests);

        $user = Auth::user();
        if (isset($requests['subjects']) && $requests['subjects']) {
            foreach ($requests['subjects'] as $subject) {
                $user->subjects()->attach($subject);
            }
        }

        if (isset($requests['interests']) && $requests['interests']) {
            foreach ($requests['interests'] as $interest) {
                $user->interests()->attach($interest);
            }
        }

        // if ($requests['interests']) {
        //     $interests = explode(',', $requests['interests']);
        //     foreach ($interests as $key => $value) {

        //         $interest = Interest::where('title->ar', 'like', '%'.trim(json_encode($value,JSON_UNESCAPED_UNICODE), '"').'%')->orwhere('title->en', 'like', '%'.trim(json_encode($value,JSON_UNESCAPED_UNICODE), '"').'%')->first();
        //         if (!$interest) {

        //             $title = [];
        //             $title['ar'] =  $value;
        //             $title['en'] =  $value;
                    
        //             $interest = Interest::create(['slug' => Str::slug($title['en']) ,'title' => $title ,'desc' => $title ]);
        //         }

        //         $user->interests()->attach($interest->id);
        //     }
        // }


        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));

        return redirect()->back();
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
