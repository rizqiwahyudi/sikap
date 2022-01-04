<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \DataTables;

class AcademicYearController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:academic-year-list|academic-year-create|academic-year-edit|academic-year-delete', ['only' => ['index','store']]);
         $this->middleware('permission:academic-year-create', ['only' => ['create','store']]);
         $this->middleware('permission:academic-year-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:academic-year-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $academic_years = AcademicYear::all();
        $auth           = Auth::user();

        if ($request->ajax()) {
            return DataTables::of($academic_years)
                        ->addColumn('academic_year', function($row) {
                            return $row->academic_year;
                        })
                        ->addColumn('action', function($row)use($auth) {
                            $button =   '';
                            if ($auth->can('academic-year-edit')) {
                                $button .= '&nbsp;&nbsp;';
                                $button .=   '<a href="/academic-years/'.$row->id.'/edit" class="btn btn-icon btn-primary btn-icon-only rounded-circle btn-sm">
                                                <span class="btn-inner--icon"><i class="fas fa-pen-square"></i></span>
                                            </a>';
                            }
                            if($auth->can('academic-year-delete')){
                                
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

        return view('pages.academicYears.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'academic_year' => 'required',
        ]);

        $academic_year = AcademicYear::create($request->all());

        if ($academic_year) {
            return redirect()->route('academic-years.index')->with('success', 'Created Academic Year Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicYear $academic_year)
    {
        return view('pages.academicYears.edit', compact('academic_year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicYear $academic_year)
    {
        $request->validate([
            'academic_year' => 'required',
        ]);

        $academic_year->update($request->all());

        if ($academic_year) {
            return redirect()->route('academic-years.index')->with('success', 'Academic Year Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicYear $academic_year)
    {
        $academic_year->delete();
        
        if ($academic_year) {
            return redirect()->route('academic-years.index')->with('success', 'Academic Year Deleted Successfully.');
        }
    }
}
