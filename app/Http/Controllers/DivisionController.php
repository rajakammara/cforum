<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        //
    }

    public function fetch_user_Divisions(Request $request)
    {
        //$data['divisions'] = Division::where('dept_id', '=', $request->id)->get();
        $dept_id = $request->get('dept_id');
        $data['divisions'] = Division::join('users', 'divisions.id', '=', 'users.division_id')->where('divisions.dept_id', '=', $dept_id)->get(['divisions.*']);
        return response()->json($data);
    }
    public function fetchDivisions(Request $request)
    {
        $data['divisions'] = Division::where('dept_id', '=', $request->dept_id)->get();
        // $dept_id = $request->get('dept_id');
        // $data['divisions'] = Division::join('users', 'divisions.id', '=', 'users.division_id')->where('divisions.dept_id', '=', $dept_id)->get(['divisions.*']);
        return response()->json($data);
    }
}
