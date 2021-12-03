<?php

namespace App\Http\Controllers;

use App\Models\ListKp;
use Illuminate\Http\Request;

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
    
    public function index()
    {
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
    public function store(Request $request)
    {
        //
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
    public function edit(ListKp $listKp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListKp  $listKp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListKp $listKp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListKp  $listKp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListKp $listKp)
    {
        //
    }
}
