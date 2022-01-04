<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \DataTables;

class MajorController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:major-list|major-create|major-edit|major-delete', ['only' => ['index','store']]);
         $this->middleware('permission:major-create', ['only' => ['create','store']]);
         $this->middleware('permission:major-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:major-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $majors = Major::all();
        $auth   = Auth::user();

        if ($request->ajax()) {
            return DataTables::of($majors)
                        ->addColumn('name', function($row) {
                            return $row->name;
                        })
                        ->addColumn('description', function($row) {
                            return $row->description;
                        })
                        ->addColumn('action', function($row)use($auth) {
                            $button =   '';
                            if ($auth->can('major-edit')) {
                                $button .= '&nbsp;&nbsp;';
                                $button .=   '<a href="/majors/'.$row->id.'/edit" class="btn btn-icon btn-primary btn-icon-only rounded-circle btn-sm">
                                                <span class="btn-inner--icon"><i class="fas fa-pen-square"></i></span>
                                            </a>';
                            }
                            if($auth->can('major-delete')){
                                
                                $button .= '&nbsp;&nbsp;';
                                $button .= '<a href="#" class="btn btn-icon btn-danger btn-icon-only rounded-circle btn-sm" onclick="confirmForm(this)" data-id="'.$row->id.'">
                                                <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                                            </a>';     
                            }
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('pages.majors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.majors.create');
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
            'name'          => 'required',
            'description'   => 'nullable'
        ]);

        $major = Major::create($request->all());

        if ($major) {
            return redirect()->route('majors.index')->with('success', 'Major Created Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        return view('pages.majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'nullable'
        ]);

        $major->update($request->all());

        if ($major) {
            return redirect()->route('majors.index')->with('success', 'Major Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        $major->delete();

        if ($major) {
            return redirect()->route('majors.index')->with('success', 'Major Deleted Successfully.');
        }
    }
}
