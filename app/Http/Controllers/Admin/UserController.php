<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Auth;
use Validator;
use Redirect;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , User $users)
    {

        $users = $users->newQuery();
        
        if ($request->role_id) {

            $role_id = $request->role_id;

            $users->whereHas('roles',function($q) use ($role_id){
                $q->where('id', $role_id);
            });
        }

        if ($request->email) {
            $users->where('email', $request->email);
        }

        if ($request->mobile) {
            $users->where('mobile', $request->mobile);
        }

        
        if ($request->type == 'staff') {
            $role_id = $request->role_id;
            $users->whereHas('roles',function($q) use ($role_id){
                $q->whereIn('name', ['Admin','NLEC Manager','Project Manager','Project Coordinator']);
            });

        }elseif ($request->type == 'contributors') {
            $users->doesntHave('roles');
        }

        if ($request->has('trashed')) {
            $users->onlyTrashed();
        }


        if ($users) {

            $users = $users->latest()->paginate(20);
            $roles = Role::all();

            return view('admin.users.index',compact('users','roles'));

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $requests = $request->all();

        //image
        if (isset($requests['avatar'])) {
            $requests['avatar'] = $this->uploadImage($requests['avatar']);
        }

        if ($requests['password']) {
            $requests['password'] = bcrypt($requests['password']);
        }

        $user = User::create($requests);

        if (isset($requests['roles'][0])) {
            $user->assignRole($requests('roles'));
        }

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));
        return redirect(route('admin.users.index'));
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
    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
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

        $user = User::find($id);
        $user = $user->update($requests);

        $user = User::find($id);

        if (isset($requests['roles'])) {
            $user->syncRoles($requests['roles']);
        }

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));

        return redirect()->to(route('admin.users.index'));
    }
    /**
     * Soft delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $user = User::withTrashed()->find($id);

        $user->forceDelete();

        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect(route('admin.users.index'));
    }

    /**
     * Restore the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $user = User::withTrashed()->find($id);

        $user->restore();

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.restore_success'));

        return redirect(route('admin.users.index'));
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
