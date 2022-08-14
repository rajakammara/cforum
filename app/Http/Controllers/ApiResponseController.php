<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeptCollection;
use App\Http\Resources\IssuesCollection;
use App\Models\Issue;
use Illuminate\Http\Request;
use App\Http\Resources\ComplaintCollection;
use App\Models\Complaint;
use App\Models\Department;
use App\Models\User;

class ApiResponseController extends Controller
{
    //Get All Departments
    public function getAllDepartments(Request $request)
    {
        $departments = \App\Models\Department::all();
        return new DeptCollection($departments);
    }

    //Get All Issues
    public function getAllIssues(Request $request)
    {
        return new IssuesCollection(Issue::all());
    }

    //Get Issues by Department Id
    public function getIssuesByDeptId(Request $request)
    {
        $dept_id = $request->dept_id;
        // $issue_data = Issue::where("dept_id", $dept_id)->get();
        // return response()->json(["data" => $issue_data]);

        return new IssuesCollection(Issue::where('dept_id', $dept_id)->get());
    }

    //Get All Complaints
    public function getAllComplaints(Request $request)
    {
        return new ComplaintCollection(Complaint::all());
    }

    //Get All Complaints by Dept Id
    public function getAllDeptComplaints(Request $request)
    {
        $dept_id = $request->deptid;
        return new ComplaintCollection(Complaint::where('dept_id', $dept_id)->where('complaint_status', "=", "Pending")->get());
    }

    //Get All Complaints by User Id
    public function getAllUserComplaints(Request $request)
    {
        $user_id = $request->userid;
        return new ComplaintCollection(Complaint::where('user_id', $user_id)->get());
    }

    //Get Dashboard stats
    public function getDashboardStats(Request $request)
    {
        $user_role = $request->get('role');
        $user_deptId = $request->get('dept_id');
        $user_divisionId = $request->get('division_id');

        if ($user_role == 'local_admin' || $user_role == 'master_admin') {

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

            return response()->json(["data" => $dashboard_stats]);
        } else if ($user_role == "dist_user") {
            $totalComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user_deptId)->count('id');
            $pendingComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user_deptId)->where('complaint_status', '=', 'Pending')->count('id');
            $forwardedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user_deptId)->where('complaint_status', '=', 'Forwarded')->count('id');
            $resolvedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Resolved')->where('dept_id', '=', $user_deptId)->count('id');
            $closedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Closed')->where('dept_id', '=', $user_deptId)->count('id');

            $departments = Department::where('id', '=', $user_deptId)->count();
            $totalDeptUsers = User::where('role', '=', 'dist_user')->where('dept_id', '=', $user_deptId)->orWhere('role', '=', 'div_user')->count();
            $totalUsers = User::where('role', '=', 'user')->count();

            $totalIssues = Issue::where('dept_id', '=', $user_deptId)->count();

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
            return response()->json(["data" => $dashboard_stats]);
        } else if ($user_role == "div_user") {
            $totalComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user_deptId)->where('division_id', '=', $user_divisionId)->count('id');
            $pendingComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user_deptId)->where('division_id', '=', $user_divisionId)->where('complaint_status', '=', 'Pending')->count('id');
            $forwardedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('dept_id', '=', $user_deptId)->where('division_id', '=', $user_divisionId)->where('complaint_status', '=', 'Forwarded')->count('id');
            $resolvedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('complaint_status', '=', 'Resolved')->where('division_id', '=', $user_divisionId)->where('dept_id', '=', $user_deptId)->count('id');
            $closedComplaints = \App\Models\Complaint::with(['user', 'issue', 'department'])->where('division_id', '=', $user_divisionId)->where('complaint_status', '=', 'Closed')->where('dept_id', '=', $user_deptId)->count('id');

            $departments = Department::where('id', '=', $user_deptId)->count();
            $totalDeptUsers = User::where('role', '=', 'dist_user')->where('dept_id', '=', $user_deptId)->orWhere('role', '=', 'div_user')->count();
            $totalUsers = User::where('role', '=', 'user')->count();

            $totalIssues = Issue::where('dept_id', '=', $user_deptId)->count();

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
            return response()->json(["data" => $dashboard_stats]);
        }
    }
}
