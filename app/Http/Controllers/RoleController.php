<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use \DataTables;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::all();
        $auth  = Auth::user();

        if ($request->ajax()) {
            return DataTables::of($roles)
                        ->addColumn('name', function($row) {
                            $badge = '<label class="badge bg-light text-dark">'.$row->name.'</label>';
                            return $badge;
                        })
                        ->addColumn('action', function($row)use($auth) {
                            $button =   '<a href="/roles/'.$row->id.'" class="btn btn-icon btn-secondary btn-icon-only rounded-circle btn-sm">
                                            <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                                        </a>';
                            if ($auth->can('role-edit')) {
                                $button .= '&nbsp;&nbsp;';
                                $button .=   '<a href="/roles/'.$row->id.'/edit" class="btn btn-icon btn-primary btn-icon-only rounded-circle btn-sm">
                                                <span class="btn-inner--icon"><i class="fas fa-pen-square"></i></span>
                                            </a>';
                            }
                            if($auth->can('role-delete')){
                                
                                $button .= '&nbsp;&nbsp;';
                                $button .= '<a href="#" class="btn btn-icon btn-danger btn-icon-only rounded-circle btn-sm" onclick="confirmForm(this)" data-id="'.$row->id.'">
                                                <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                                            </a>';     
                            }
                            return $button;
                        })
                        ->rawColumns(['name', 'action'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('pages.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:roles,name',
            'permission'    => 'required',
        ]);

        foreach ($request->permission as $permission) {
            $data[] = $permission;
        }
        
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions([$data]);

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Create Role Successfully');
        } else {
            return redirect()->route('roles.create')->with('error', 'Something Went Wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                                ->where('role_has_permissions.role_id', $id)
                                ->get();
        
        return view('pages.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")
                                ->where("role_has_permissions.role_id", $role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();
        return view('pages.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'       => 'required|unique:roles,name,'.$role->id,
            'permission' => 'required',
        ]);

        foreach ($request->permission as $permission) {
            $data[] = $permission;
        }

        $role->update(['name' => $request->name]);
        $role->syncPermissions([$data]);

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Updated Role Successfully');
        } else {
            return redirect()->route('roles.create')->with('error', 'Something Went Wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Deleted User Successfully');
        } else {
            return redirect()->route('roles.index')->with('Error', 'Something Went Wrong!');
        }
    }
}
