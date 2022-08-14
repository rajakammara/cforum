<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $abstractQuery = "Select a.id,a.department_name,sum(totalcomplaints) as 'totalcomplaints',sum(pendingcomplaints) as 'pendingcomplaints',sum(forwardedcomplaints) as 'forwardedcomplaints', sum(resolvedcomplaints) as 'resolvedcomplaints', sum(closedcomplaints) as 'closedcomplaints' from (
        SELECT d.id,d.department_name,count(i.id) as 'totalcomplaints',0 as 'pendingcomplaints',0 as 'forwardedcomplaints',0 as 'resolvedcomplaints',0 as 'closedcomplaints' FROM `complaints` c inner join departments d on c.dept_id=d.id inner join issues i on c.issue_id=i.id GROUP by d.department_name,d.id
        union ALL
        SELECT d.id,d.department_name,0 as 'totalcomplaints',count(i.id) as 'pendingcomplaints',0 as 'forwardedcomplaints',0 as 'resolvedcomplaints',0 as 'closedcomplaints' FROM `complaints` c inner join departments d on c.dept_id=d.id inner join issues i on c.issue_id=i.id where c.complaint_status='Pending' GROUP by d.department_name,d.id
        union ALL
        SELECT d.id, d.department_name,0 as 'totalcomplaints',0 as 'pendingcomplaints',count(i.id) as 'forwardedcomplaints',0 as 'resolvedcomplaints',0 as 'closedcomplaints' FROM `complaints` c inner join departments d on c.dept_id=d.id inner join issues i on c.issue_id=i.id where c.complaint_status='Forwarded' GROUP by d.department_name,d.id
        union ALL
        SELECT d.id,d.department_name,0 as 'totalcomplaints',0 as 'pendingcomplaints',0 as 'forwardedcomplaints',count(i.id) as 'resolvedcomplaints',0 as 'closedcomplaints' FROM `complaints` c inner join departments d on c.dept_id=d.id inner join issues i on c.issue_id=i.id where c.complaint_status='Resolved' GROUP by d.department_name,d.id
        union ALL
        SELECT d.id,d.department_name,0 as 'totalcomplaints',0 as 'pendingcomplaints',0 as 'forwardedcomplaints',0 as 'resolvedcomplaints',count(i.id) as 'closedcomplaints' FROM `complaints` c inner join departments d on c.dept_id=d.id inner join issues i on c.issue_id=i.id where c.complaint_status='Closed' GROUP by d.department_name,d.id
        ) a group by a.id,a.department_name order by a.department_name";

        $abstractComplaints = DB::select($abstractQuery);



        //dd($abstractComplaints);

        return view('reports.index', compact('abstractComplaints'));
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

    public function departmentComplaints($id)
    {
        $departmentComplaints = Complaint::with(['department', 'issue', 'user'])->where('dept_id', '=', $id)->paginate();

        return view('reports.department_complaints', compact('departmentComplaints'));
    }
}
