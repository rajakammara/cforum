<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeptCollection;
use App\Http\Resources\IssuesCollection;
use App\Models\Issue;
use Illuminate\Http\Request;
use App\Http\Resources\ComplaintCollection;
use App\Models\Complaint;
use App\Models\ComplaintTracking;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
    //Get All Complaints
    public function getAllPendingDeptComplaints(Request $request)
    {
        return new ComplaintCollection(Complaint::all()->where('dept_id', "=", $request->get("dept_id")));
    }


    //Get All Pending Complaints
    public function getAllPendingComplaints(Request $request)
    {
        return new ComplaintCollection(Complaint::all()->where("complaint_status", "=", "Pending"));
    }


    //Get All Forwarded Complaints
    public function getAllForwardedComplaints(Request $request)
    {
        return new ComplaintCollection(Complaint::all()->where("complaint_status", "=", "Forwarded"));
    }

    //Get All Forwarded  dept Complaints
    public function getallforwardeddeptcomplaints(Request $request)
    {
        return new ComplaintCollection(Complaint::all()->where("complaint_status", "=", "Forwarded")->where('dept_id', '=', $request->get("dept_id")));
    }

    //Get All Closed Complaints
    public function getAllClosedComplaints(Request $request)
    {
        return new ComplaintCollection(Complaint::all()->where("complaint_status", "=", "Closed"));
    }

    //Get All Closed Dept Complaints
    public function getAllClosedDeptComplaints(Request $request)
    {
        return new ComplaintCollection(Complaint::all()->where("complaint_status", "=", "Closed")->where('dept_id', '=', $request->get("dept_id")));
    }

    //Get All Pending Complaints by Dept Id get username
    public function getAllDeptComplaints(Request $request)
    {


        $dept_id = $request->deptid;
        return new ComplaintCollection(Complaint::where('dept_id', $dept_id)->where('complaint_status', "=", "Pending")->get());
    }

    //Get All Pending Complaints by Dept Id and Division Id
    public function getAllDivisionComplaints(Request $request)
    {
        $dept_id = $request->deptid;
        $division_id = $request->divisionid;
        return new ComplaintCollection(Complaint::where('dept_id', $dept_id)->where('division_id', "=", $division_id)->where('complaint_status', "=", "Forwarded")->get());
    }


    //Get All Complaints by User Id
    public function getAllUserComplaints(Request $request)
    {
        $user_id = $request->userid;
        return new ComplaintCollection(Complaint::where('user_id', $user_id)->get());
    }

    //Get All Complaint Details by  Id
    public function getComplaint(Request $request)
    {
        $complaint_id = $request->cid;
        $complaint = DB::select("select c.*,i.issue_details,u.name,u.mobile_no,u.email,d.department_name,m.mandal_name,m.mandal_name_te,v.village_name,v.village_name_te from complaints c inner join issues i on c.issue_id=i.id inner join users u on c.user_id=u.id inner join departments d on c.dept_id = d.id inner join mandal_masters m on c.mandal_id=m.id inner join village_masters v on c.village_id=v.id where c.id =?", [$complaint_id]);
        return response()->json(["data" => $complaint]);
        //return new ComplaintCollection(Complaint::where('id', $complaint_id)->get());
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

    public function updateComplaint(Request $request)
    {
        $complaint = Complaint::find($request->complaint_id);
        $dept_user_id = $request->dept_user_id;
        if ($request->get('complaint_status') == 'Forwarded') {
            $this->validate($request, [
                'action_taken_remarks' => 'required',
                'complaint_status' => 'required',
                'division_id' => 'required',
            ]);

            $divisionuser = User::where('dept_id', '=', $complaint->dept_id)->where('division_id', '=', $request->get('division_id'))->first();

            $complaint->actiontaken_remarks = $request->get('action_taken_remarks');
            $complaint->complaint_status = $request->get('complaint_status');
            $complaint->division_id = $request->get('division_id');
            $complaint->dept_user_id = $dept_user_id;
            $complaint->save();

            $complaint_tracking = ComplaintTracking::create([
                'complaint_id' => $complaint->id,
                'dept_user_id' => $dept_user_id,
                'dept_id' => $complaint->dept_id,
                'division_id' => $request->get('division_id'),
                'dept_remarks' => $request->get('action_taken_remarks'),
                'complaint_status' => $complaint->complaint_status,
                'custom_complaint_id' => $complaint->complaint_id,
            ]);



            return response()->json(['success', 'Complaint Status Updated Successfully']);
        } else {
            $this->validate($request, [
                'action_taken_remarks' => 'required',
                'complaint_status' => 'required',
                'action_taken_report' => 'required|file|max:2000|mimes:pdf,jpg,png,jpeg,doc,gif',
            ]);

            if ($request->hasFile("action_taken_report")) {
                // Get filename with the extension
                $filenameWithExt = $request->file('action_taken_report')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('action_taken_report')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $request->file('action_taken_report')->storeAs('public/reports/complaints', $fileNameToStore);
            } else {
                //$fileNameToStore = "Testing.jpg";
            }

            $complaint->actiontaken_remarks = $request->get('action_taken_remarks');
            $complaint->complaint_status = $request->get('complaint_status');
            $complaint->division_id = $request->get('division_id');
            $complaint->dept_user_id = $dept_user_id;
            $complaint->actiontaken_report = $fileNameToStore;
            $complaint->save();
            return response()->json(['success', 'Complaint Status Updated Successfully']);
        }
    }
    function getAppUsers()
    {
        $users = User::where("role", "=", "user")->get();
        return response()->json(["data" => $users]);
    }
    function getDeptUsers()
    {
        $users = User::where("role", "=", "dist_user")->orWhere("role", "=", "div_user")->get();
        return response()->json(["data" => $users]);
    }
}
