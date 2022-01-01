<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use \DataTables;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users  = User::all();
        $auth   = Auth::user();

        if ($request->ajax()) {
            return DataTables::of($users)
                        ->addColumn('username', function($row) {
                            return $row->username;
                        })
                        ->addColumn('email', function($row) {
                            return $row->email;
                        })
                        ->addColumn('role', function($row) {
                            if (!empty($row->getRoleNames())) {
                                foreach ($row->getRoleNames() as $role) {
                                    if ($role == 'admin') {
                                        $badge = '<label class="badge badge-success">'.$role.'</label>';
                                        return $badge;
                                    } else {
                                        $badge = '<label class="badge badge-warning">'.$role.'</label>';
                                        return $badge;
                                    }
                                }
                            }
                        })
                        ->addColumn('action', function($row)use($auth) {
                            $button =   '';
                            if ($auth->can('user-edit')) {
                                $button .= '&nbsp;&nbsp;';
                                $button .=   '<a href="/users/'.$row->id.'/edit" class="btn btn-icon btn-primary btn-icon-only rounded-circle btn-sm">
                                                <span class="btn-inner--icon"><i class="fas fa-pen-square"></i></span>
                                            </a>';
                            }
                            if($auth->can('user-delete')){
                                
                                $button .= '&nbsp;&nbsp;';
                                $button .= '<a href="#" class="btn btn-icon btn-danger btn-icon-only rounded-circle btn-sm" onclick="confirmForm(this)" data-id="'.$row->id.'">
                                                <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                                            </a>';     
                            }
                            return $button;
                        })
                        ->rawColumns(['role', 'action'])
                        ->addIndexColumn()
                        ->make(true);
        }
        return view('pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = Role::all();

        return view('pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'username'  => 'required|string|max:255|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
            'role'      => 'required|not_in:0',
        ]);

        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->assignRole($request->role);
        
        if ($user) {
            return redirect()->route('users.index')->with('success', 'Created User Successfully.');
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
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        $user_role = $user->getRoleNames();

        return view('pages.users.edit', compact('user', 'roles', 'user_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        $request->validate([
            'username'  => 'required|string|max:255|unique:users,username,'. $user->id,
            'email'     => 'string|email|max:255|unique:users,email,'. $user->id,
            'password'  => 'string|min:8|confirmed|nullable',
            'role'      => 'required|not_in:0',
        ]);

        if (is_null($request->password)) {
            unset($data['password']);
            $user->update($data);
        } else {
            $data['password'] = Hash::make($request->password);
            $user->update($data);
        }

        return redirect()->route('users.index')->with('success', 'Updated User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        if ($user) {
            return redirect()->route('users.index')->with('success', 'Deleted User Successfully');
        } else {
            return redirect()->route('users.index')->with('Error', 'Something Went Wrong!');
        }
    }
}
