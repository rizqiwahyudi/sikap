<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \DataTables;

class KelasController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:kelas-list|kelas-create|kelas-edit|kelas-delete', ['only' => ['index','store']]);
         $this->middleware('permission:kelas-create', ['only' => ['create','store']]);
         $this->middleware('permission:kelas-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:kelas-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kelas  = Kelas::all();
        $auth   = Auth::user();

        if ($request->ajax()) {
            return DataTables::of($kelas)
                        ->addColumn('kelas', function($row) {
                            return $row->kelas;
                        })
                        ->addColumn('sub_kelas', function($row) {
                            return $row->sub_kelas;
                        })
                        ->addColumn('major', function($row) {
                            $major = Major::findOrFail($row->major_id);
                            return $major->name;
                        })
                        ->addColumn('action', function($row)use($auth) {
                            $button =   '';
                            if ($auth->can('kelas-edit')) {
                                $button .= '&nbsp;&nbsp;';
                                $button .=   '<a href="/kelas/'.$row->id.'/edit" class="btn btn-icon btn-primary btn-icon-only rounded-circle btn-sm">
                                                <span class="btn-inner--icon"><i class="fas fa-pen-square"></i></span>
                                            </a>';
                            }
                            if($auth->can('kelas-delete')){
                                
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

        return view('pages.kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::all();

        return view('pages.kelas.create', compact('majors'));
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
            'major_id'  => 'required|not_in:0',
            'kelas'     => 'required',
            'sub_kelas' => 'required',
        ]);

        $kelas = Kelas::create($request->all());

        if ($kelas) {
            return redirect()->route('kelas.index')->with('success', 'Kelas Created Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        $majors = Major::all();

        return view('pages.kelas.edit', compact('majors', 'kela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'major_id'  => 'required|not_in:0',
            'kelas'     => 'required',
            'sub_kelas' => 'required',
        ]);

        $kela->update($request->all());

        if ($kela) {
            return redirect()->route('kelas.index')->with('success', 'Kelas Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();

        if ($kela) {
            return redirect()->route('kelas.index')->with('success', 'Kelas Deleted Successfully.');
        }
    }
}
