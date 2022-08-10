<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintTracking;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        } else {
            $fileNameToStore = "Testing.jpg";
        }
        //Get District Officer Details
        $distofficer = User::where('dept_id', '=', $request->get('dept_id'))->first();

        // Create New Complaint
        $complaint = new Complaint();
        $complaint->user_id = $request->get('user_id');
        $complaint->dept_id = $request->get('dept_id');
        $complaint->issue_id = $request->get('issue_id');
        $complaint->user_remarks = $request->get('user_remarks');
        $complaint->photo = $fileNameToStore;
        $complaint->complaint_status = "Pending";
        //$complaint->user_feedback = $request->get('user_feedback');
        $complaint->latitude = $request->get('latitude');
        $complaint->longitude = $request->get('longitude');
        $complaint->dept_user_id = $distofficer->id;
        $complaint->save();


        $complaint_tracking = ComplaintTracking::create([
            'complaint_id' => $complaint->id,
            'dept_user_id' => $distofficer->id,
            'dept_id' => $complaint->dept_id,
            'dept_remarks' => 'Under process.',
            'complaint_status' => $complaint->complaint_status,
            'custom_complaint_id' => $complaint->complaint_id,
        ]);


        return response()->json(['success' => "Complaint Submitted Successfull"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::find($id);
        return view('complaints.show', compact('complaint'));
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
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $user = Auth::user();
        $complaint = Complaint::find($id);

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
            $complaint->dept_user_id = $user->id;
            $complaint->save();

            $complaint_tracking = ComplaintTracking::create([
                'complaint_id' => $complaint->id,
                'dept_user_id' => $user->id,
                'dept_id' => $complaint->dept_id,
                'division_id' => $request->get('division_id'),
                'dept_remarks' => $request->get('action_taken_remarks'),
                'complaint_status' => $complaint->complaint_status,
                'custom_complaint_id' => $complaint->complaint_id,
            ]);



            return back()->with('success', 'Complaint Status Updated Successfully');
        } else {
            $this->validate($request, [
                'action_taken_remarks' => 'required',
                'complaint_status' => 'required',
                'action_taken_report' => 'required|file|max:1000|mimes:pdf',
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
            $complaint->dept_user_id = $user->id;
            $complaint->actiontaken_report = $fileNameToStore;
            $complaint->save();
            return back()->with('success', 'Complaint Status Updated Successfully');
        }
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

    // API Complaint Status Update

    public function update_status_api(Request $request)
    {
        if ($request->get('complaint_status') == 'Forwarded') {
            $this->validate($request, [
                'complaint_id' => 'required',
                'action_taken_remarks' => 'required',
                'complaint_status' => 'required',
                'division_id' => 'required',
                'user_id' => 'required',
            ]);
            $complaint = Complaint::find($request->get('complaint_id'));

            $complaint->actiontaken_remarks = $request->get('action_taken_remarks');
            $complaint->complaint_status = $request->get('complaint_status');
            $complaint->division_id = $request->get('division_id');
            $complaint->dept_user_id = $request->get('user_id');
            $complaint->save();

            $complaint_tracking = ComplaintTracking::create([
                'complaint_id' => $complaint->id,
                'dept_user_id' => $request->get('user_id'),
                'dept_id' => $complaint->dept_id,
                'division_id' => $request->get('division_id'),
                'dept_remarks' => $request->get('action_taken_remarks'),
                'complaint_status' => $complaint->complaint_status,
                'custom_complaint_id' => $complaint->complaint_id,
            ]);



            return response()->json(['success' => "Complaint Status Updated Successfully"]);
        } else {
            $this->validate($request, [
                'action_taken_remarks' => 'required',
                'complaint_status' => 'required',
                'action_taken_report' => 'required|file|max:1000|mimes:pdf',
                'user_id' => 'required',
            ]);
            $complaint = Complaint::find($request->get('complaint_id'));

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
            $complaint->dept_user_id = $request->get('user_id');
            $complaint->actiontaken_report = $fileNameToStore;
            $complaint->save();
            return response()->json('success', 'Complaint Status Updated Successfully');
        }
    }
}
