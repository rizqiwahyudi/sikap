<?php

namespace App\Http\Controllers;

use App\Models\ListKp;
use Illuminate\Http\Request;
use \DataTables;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ListsKpImport;
use App\Http\Requests\StoreListKpRequest;
use App\Http\Requests\UpdateListKpRequest;
use App\Exports\ListsKpExport;


class ListKpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:kp-list|kp-create|kp-edit|kp-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:kp-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kp-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kp-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $lists  = ListKp::all();
            $auth   = Auth::user();
            return DataTables::of($lists)
                    ->addIndexColumn()
                    ->addColumn('name', function($row) {
                        return $row->name;
                    })
                    ->addColumn('address', function($row) {
                        return $row->address;
                    })
                    ->addColumn('telephone', function($row) {
                        return $row->telephone;
                    })
                    ->addColumn('postal_code', function($row) {
                        return $row->postal_code;
                    })
                    ->addColumn('city', function($row) {
                        return $row->city;
                    })
                    ->addColumn('action', function($row)use($auth) {
                        $button = '';

                        if ($auth->can('kp-edit')) {
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href="/lists-kp/'.$row->id.'/edit" class="btn btn-icon btn-primary btn-icon-only rounded-circle btn-sm">
                                            <span class="btn-inner--icon"><i class="fas fa-pen-square"></i></span>
                                        </a>';
                        }
                        if ($auth->can('kp-delete')) {
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href="#" class="btn btn-icon btn-danger btn-icon-only rounded-circle btn-sm" onclick="confirmForm(this)" data-id="'.$row->id.'">
                                            <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                                        </a>';
                        }
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('pages.listsKp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.listsKp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListKpRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['created_by'] = Auth::user()->username;
        ListKp::create($validatedData);

        return redirect()->route('lists-kp.index')
                         ->with('success', 'Tempat KP Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListKp  $listKp
     * @return \Illuminate\Http\Response
     */
    public function show(ListKp $listKp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListKp  $listKp
     * @return \Illuminate\Http\Response
     */
    public function edit(ListKp $lists_kp)
    {
        return view('pages.listsKp.edit', compact('lists_kp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListKp  $listKp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListKpRequest $request, ListKp $lists_kp)
    {
        $validatedData = $request->validated();

        $validatedData['updated_by'] = Auth::user()->username;
        $lists_kp->update($validatedData);

        return redirect()->route('lists-kp.index')
                         ->with('success', 'Tempat KP Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListKp  $listKp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListKp $lists_kp)
    {
        $deleteList = $lists_kp->delete();

        if ($deleteList) {
            return redirect()->route('lists-kp.index')
                         ->with('success', 'Tempat KP Berhasil Dihapus !');
        } else {
            return redirect()->route('lists-kp.index')
                         ->with('error', 'Tempat KP Gagal Dihapus !');
        }
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $import = Excel::import(new ListsKpImport, $request->file('file'));

        if ($import) {
            return redirect()->route('lists-kp.index')
                             ->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            return redirect()->route('lists-kp.index')
                             ->with(['error' => 'Data Gagal Diimport!']);
        }
    }

    public function export()
    {
        return Excel::download(new ListsKpExport, 'lists-kp.xlsx');
    }
}
