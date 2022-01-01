<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use \DataTables;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
         $this->middleware('permission:permission-create', ['only' => ['create','store']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::all();
        $auth        = Auth::user();

        if ($request->ajax()) {
            return DataTables::of($permissions)
                        ->addColumn('name', function($row) {
                            $badge = '<label class="badge bg-light text-dark">'.$row->name.'</label>';
                            return $badge;
                        })
                        ->addColumn('action', function($row)use($auth) {
                            $button =   '';
                            if ($auth->can('permission-edit')) {
                                $button .= '&nbsp;&nbsp;';
                                $button .=   '<a href="/permissions/'.$row->id.'/edit" class="btn btn-icon btn-primary btn-icon-only rounded-circle btn-sm">
                                                <span class="btn-inner--icon"><i class="fas fa-pen-square"></i></span>
                                            </a>';
                            }
                            if($auth->can('permission-delete')){
                                
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

        return view('pages.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.permissions.create');
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
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = Permission::create(['name' => $request->name]);

        if ($permission) {
            return redirect()->route('permissions.index')->with('success', 'Create Permission Successfully');
        } else {
            return redirect()->route('permissions.create')->with('error', 'Something Went Wrong!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('pages.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$permission->id,
        ]);

        $permission->update($request->all());

        if ($permission) {
            return redirect()->route('permissions.index')->with('success', 'Updated Permission Successfully');
        } else {
            return redirect()->route('permissions.index')->with('Error', 'Something Went Wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        if ($permission) {
            return redirect()->route('permissions.index')->with('success', 'Deleted Permission Successfully');
        } else {
            return redirect()->route('permissions.index')->with('Error', 'Something Went Wrong!');
        }
    }
}
