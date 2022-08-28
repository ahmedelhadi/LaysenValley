<?php

namespace App\Http\Controllers\Admin;

use Session;
use DB;
use Auth;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->with('permissions')->paginate(20);
        $permissions = Permission::get();

        if ($request->table == 'true') {
            return view('admin.roles.index-table', compact('roles','permissions'));
        }
        return view('admin.roles.index', compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('admin.roles.create', compact('permissions'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name',
            //'permissions' => 'required',
        ]);


        $role = Role::create($data);
        $role->syncPermissions(request('permissions'));

        if ($role) {
            $log           = new Log;
            $log->id       = Str::uuid();
            $log->user_id  = Auth::user()->id;
            $log->action   = 'created';
            $log->logable_type    = get_class($role);
            $log->logable_id      = $role->id;
            $log->url      = $request->server()['REQUEST_URI'];
            $log->ip       = $request->server()['REMOTE_ADDR'];
            $log->save();
        }


        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();


        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);


        $role = Role::find($id);
        $role->update($data);



        $role->syncPermissions(request('permissions'));

        if ($role) {
            $log           = new Log;
            $log->id       = Str::uuid();
            $log->user_id  = Auth::user()->id;
            $log->action   = 'updated';
            $log->logable_type    = get_class($role);
            $log->logable_id      = $role->id;
            $log->url      = $request->server()['REQUEST_URI'];
            $log->ip       = $request->server()['REMOTE_ADDR'];
            $log->save();
        }


        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role  = Role::findOrFail($id);
        $role->delete();

        if ($role) {
            $log           = new Log;
            $log->id       = Str::uuid();
            $log->user_id  = Auth::user()->id;
            $log->action   = 'delete';
            $log->model    = 'role-' . $role->id;
            $log->url      = $request->server()['REQUEST_URI'];
            $log->ip       = $request->server()['REMOTE_ADDR'];
            $log->save();
        }

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role deleted successfully');
    }

    public function massiveUpdate(Request $request)
    {
        if ($request->permissions) {
            foreach ($request->permissions as $key => $value) {

                $role = Role::find($key);

                $role->syncPermissions($value);

                Session::flash('status', __('admin.success'));
                Session::flash('message', __('admin.update_success'));

                return redirect()->to(route('admin.roles.index').'?table=true');

            }
        }
    }


    public function updatePermissions(Request $request)
    {
        // clear permission cache
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $collection = Route::getRoutes();

        $permissions = [];

        foreach ($collection as $route) {
            $routeName = $route->getName();
            $routePartials = explode('.', $routeName);

            if ($routeName && $routePartials[0] == 'admin'   && !in_array($routeName, config('permission.excluded_routes'))) {

                $page = $routePartials[1];

                $action = $routePartials[2];

                switch (true) {
                    case in_array($action, ['index', 'show']):
                        $permissions[$page . '_view'] = $page . ' view';
                        break;

                    case in_array($action, ['create', 'store']):
                        $permissions[$page . '_create'] = $page . ' create';
                        break;

                    case in_array($action, ['edit', 'update']):
                        $permissions[$page . '_edit'] = $page . ' edit';
                        break;

                    case in_array($action, ['destroy']):
                        $permissions[$page . '_delete'] = $page . ' delete';
                        break;

                    default:
                        $permissions[$page . '_' . $action] = $page . ' ' . $action;
                        break;
                }
            }
        }
        
        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        return back();
    }
}
