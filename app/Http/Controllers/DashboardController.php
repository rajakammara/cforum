<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // Load all complaints when auth user don't have dept id value
        if ($user->role == 'local_admin' || $user->role == 'master_admin') {
            $complaints = \App\Models\Complaint::where('complaint_status', '=', 'Pending')->paginate();
            return view('dashboard', compact('complaints'));
        } else if ($user->role == "dist_user") {
            // Load all complaints when auth user have dept id value
            $complaints = \App\Models\Complaint::where('dept_id', '=', $user->dept_id)->where('complaint_status', '=', 'Pending')->orWhere('complaint_status', '=', 'Forwarded')->paginate();
            return view('dashboard', compact('complaints'));
        } else if ($user->role == "div_user") {
            // Load all complaints when auth user have dept id value and division
            $complaints = \App\Models\Complaint::where('dept_id', '=', $user->dept_id)->where('division_id', '=', $user->division_id)->where('complaint_status', '=', 'Pending')->orWhere('complaint_status', '=', 'Forwarded')->paginate();
            return view('dashboard', compact('complaints'));
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
