<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusJobsRequest;
use App\StatusJob;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusJobsSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = StatusJob::orderBy('id',
                                     'asc')->paginate(10);
        return view('manage.setting.statusJobs.index',
                    ['status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('manage.setting.statusJobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StatusJobsRequest $request
     *
     * @return void
     */
    public function store(StatusJobsRequest $request)
    {
        $status = new StatusJob();
        $status->name = $request->name;
        if ($status->save()){
            return redirect()->route('status-jobs.index');
        } else {
            return redirect()->route('status-jobs.create');
        }
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
    public function edit($id): View
    {
        $status = StatusJob::find($id);
        return \view('manage.setting.statusJobs.edit', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StatusJobsRequest $request
     * @param int               $id
     *
     * @return void
     */
    public function update(StatusJobsRequest $request, $id)
    {
        $stat = StatusJob::find($id);
        $stat->name = $request->name;
        if ($stat->save()){
            return redirect()->route('status-jobs.index');
        } else {
            return redirect()->route('status-jobs.create');
        }
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
