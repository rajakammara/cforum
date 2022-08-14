<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Issue;
use App\Models\User;
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

            $totalComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->count('id');
            $pendingComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Pending')->count('id');
            $forwardedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Forwarded')->count('id');
            $resolvedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Resolved')->count('id');
            $closedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Closed')->count('id');

            $departments = Department::count();
            $totalDeptUsers = User::where('role', '=', 'dist_user')->orWhere('role', '=', 'div_user')->count();
            $totalUsers = User::where('role', '=', 'user')->count();

            $totalIssues = Issue::count();

            $dashboard_stats = [
                'totalComplaints' => $totalComplaints,
                'pendingComplaints' => $pendingComplaints,
                'forwardedComplaints' => $forwardedComplaints,
                'closedComplaints' => $closedComplaints,
                'totalDepartments' => $departments,
                'totalUsers' => $totalUsers,
                'totalDeptUsers' => $totalDeptUsers,
                'totalIssues' => $totalIssues,
            ];
            return view('dashboard', compact('dashboard_stats'));
        } else if ($user->role == "dist_user") {

            $totalComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user->dept_id)->count('id');
            $pendingComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user->dept_id)->where('complaint_status', '=', 'Pending')->count('id');
            $forwardedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user->dept_id)->where('complaint_status', '=', 'Forwarded')->count('id');
            $resolvedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Resolved')->where('dept_id', '=', $user->dept_id)->count('id');
            $closedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Closed')->where('dept_id', '=', $user->dept_id)->count('id');

            $departments = Department::where('id', '=', $user->dept_id)->count();
            $totalDeptUsers = User::where('role', '=', 'dist_user')->where('dept_id', '=', $user->dept_id)->orWhere('role', '=', 'div_user')->count();
            $totalUsers = User::where('role', '=', 'user')->count();

            $totalIssues = Issue::where('dept_id', '=', $user->dept_id)->count();

            $dashboard_stats = [
                'totalComplaints' => $totalComplaints,
                'pendingComplaints' => $pendingComplaints,
                'forwardedComplaints' => $forwardedComplaints,
                'closedComplaints' => $closedComplaints,
                'totalDepartments' => $departments,
                'totalUsers' => $totalUsers,
                'totalDeptUsers' => $totalDeptUsers,
                'totalIssues' => $totalIssues,
            ];
            return view('dashboard', compact('dashboard_stats'));
        } else if ($user->role == "div_user") {
            $totalComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user->dept_id)->where('division_id', '=', $user->division_id)->count('id');
            $pendingComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user->dept_id)->where('division_id', '=', $user->division_id)->where('complaint_status', '=', 'Pending')->count('id');
            $forwardedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user->dept_id)->where('division_id', '=', $user->division_id)->where('complaint_status', '=', 'Forwarded')->count('id');
            $resolvedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Resolved')->where('division_id', '=', $user->division_id)->where('dept_id', '=', $user->dept_id)->count('id');
            $closedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('division_id', '=', $user->division_id)->where('complaint_status', '=', 'Closed')->where('dept_id', '=', $user->dept_id)->count('id');

            $departments = Department::where('id', '=', $user->dept_id)->count();
            $totalDeptUsers = User::where('role', '=', 'dist_user')->where('dept_id', '=', $user->dept_id)->orWhere('role', '=', 'div_user')->count();
            $totalUsers = User::where('role', '=', 'user')->count();

            $totalIssues = Issue::where('dept_id', '=', $user->dept_id)->count();

            $dashboard_stats = [
                'totalComplaints' => $totalComplaints,
                'pendingComplaints' => $pendingComplaints,
                'forwardedComplaints' => $forwardedComplaints,
                'closedComplaints' => $closedComplaints,
                'totalDepartments' => $departments,
                'totalUsers' => $totalUsers,
                'totalDeptUsers' => $totalDeptUsers,
                'totalIssues' => $totalIssues,
            ];
            return view('dashboard', compact('dashboard_stats'));
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
