<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobsRequest;
use App\Job;
use App\Service;
use App\StatusJob;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $jobs = Job::all();
        $status = StatusJob::all();
        return view('manage.jobs',
                    ['jobs' => $jobs, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource
     */
    public function create()
    {
        $services = Service::all();
        return \view('manage.jobs.create',
                     ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobsRequest $request
     *
     * @return void
     */
    public function store(JobsRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
