<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Http\Requests\JobsRequest;
use App\Job;
use App\JobHistory;
use App\Service;
use App\StatusJob;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        $status = StatusJob::all();
        foreach ($status as $stat){
            $jobsArr[$stat->name]= Job::where('status_id', $stat->id)->paginate(1000);
        }

        return view('manage.jobs.index',
                    ['status' => $status, 'jobs' => $jobsArr ]);
    }

    /**
     * Show the form for creating a new resource
     */
    public function create()
    {
        $services = Service::all();
        $contacts = Contacts::all();
        return \view('manage.jobs.create',
                     ['services' => $services, 'contacts' => $contacts,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(JobsRequest $request)
    {
        $job = new Job();
        $job->service_id = $request->service;
        $job->contact_id = $request->contact;
        $job->description = $request->description;
        $job->scope_of_work = $request->scope;
        $job->status_id = StatusJob::first()->id;
        if ($job->save()){
            $this->history(Auth::id(), $job->id, 'create', 'Job')->save();
            return redirect()->route('jobs.show', $job->id);
        }else {
            return redirect()->route('jobs.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {
        $job = Job::find($id);
        return \view('manage.jobs.show', ['job' => $job]);
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

    private function history(int $userId, int $jodId, string $action, string $component): JobHistory
    {
        $history = new JobHistory();
        $history->user_id = $userId;
        $history->job_id = $jodId;
        $history->action = $action;
        $history->component = $component;
        return $history;
    }
}
