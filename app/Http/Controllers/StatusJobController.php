<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class StatusJobController extends Controller
{


    public function update(int $id, Request $request)
    {
        $request->validate(['job' => 'required|numeric']);
        $job = Job::findOrFail($request->job);
        $job->status_id = $id;
        $job->save();
        return response()->json([$id, $job->status->name],200);
    }
}
