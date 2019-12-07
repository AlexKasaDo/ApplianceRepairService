<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Http\Requests\JobsRequest;
use App\Job;
use App\JobHistory;
use App\Service;
use App\StatusJob;
use App\EventType;
use App\Role;
use App\User;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
        $services = Service::where('is_active',true)->get();
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
            self::history(Auth::id(), $job->id, 'create', 'Job')->save();
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
        $eventType = EventType::All();

        $job = Job::find($id);

        $user = Role::where('name','=','staff')->first()->users;

        return \view('manage.jobs.show', ['job' => $job])
            ->withEventType($eventType)
            ->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit(int $id)
    {

        $job = Job::find($id);
        $services = Service::where('is_active', true)->get();
        if (!$job->service->is_active){
            $services[] = $job->service;
        }


        $contacts = Contacts::all();
        return \view('manage.jobs.edit', ['job' => $job, 'services' => $services, 'contacts' => $contacts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(JobsRequest $request, $id)
    {
        $job = Job::find($id);
        $job->service_id = $request->service;
        $job->contact_id = $request->contact;
        $job->description = $request->description;
        $job->scope_of_work = $request->scope;
        if ($job->save()){
            self::history(Auth::id(), $job->id, 'update', 'Job')->save();
            return redirect()->route('jobs.show', $job->id);
        }else {
            return redirect()->route('jobs.create');
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

    public static function history(int $userId, int $jodId, string $action, string $component): JobHistory
    {
        $history = new JobHistory();
        $history->user_id = $userId;
        $history->job_id = $jodId;
        $history->action = $action;
        $history->component = $component;
        return $history;
    }
}
