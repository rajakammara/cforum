<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MandalMaster;

class MandalMasterController extends Controller
{
    public function fetchMandals(Request $request)
    {
        $data['mandals'] = MandalMaster::all();
        // $dept_id = $request->get('dept_id');
        // $data['divisions'] = Division::join('users', 'divisions.id', '=', 'users.division_id')->where('divisions.dept_id', '=', $dept_id)->get(['divisions.*']);
        return response()->json($data,200, [], JSON_UNESCAPED_UNICODE);
    }
}
