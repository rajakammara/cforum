<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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

            "user_id" => "required",
            "dept_id" => "required",
            "issue_id" => "required",
            "user_remarks" => "required",
            //"photo" => "required|image|max:1000",

        ], [

            "user_id.required" => "Please Insert Userid",
            "dept_id.required" => "Please Insert Deptid",
            "issue_id.required" => "Please Insert Issueid",
            "user_remarks.required" => "Please Insert User Remarks",
            //"photo.required" => "Please Insert Photo",
        ]);

        if ($request->hasFile("photo")) {
            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/images/complaints', $fileNameToStore);
        }

        $complaint = new Complaint();
        $complaint->user_id = $request->get('user_id');
        $complaint->dept_id = $request->get('dept_id');
        $complaint->issue_id = $request->get('issue_id');
        $complaint->user_remarks = $request->get('user_remarks');
        $complaint->photo = $fileNameToStore;
        $complaint->complaint_status = $request->get('complaint_status');
        $complaint->user_feedback = $request->get('user_feedback');
        $complaint->save();
        return response()->json(['success' => "Complaint inserted"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
    
   
}
