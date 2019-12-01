<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCreateRequest;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $all = Service::orderBy('id', 'asc')->paginate(10);
        $active = Service::where('is_active', true)->orderBy('id', 'asc')->paginate(10);
        $inactive = Service::where('is_active', false)->orderBy('id', 'asc')->paginate(10);
        return view('manage.setting.service.index',[ 'all' => $all, 'active' => $active, 'inactive' =>$inactive]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('manage.setting.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServiceCreateRequest $request)
    {
        $serv = new Service();
        $serv->name = $request->name;
        $serv->description = $request->description;
        $serv->is_active = $request->status;
        if ($serv->save()){
            return redirect()->route('services.index');
        } else {
            return redirect()->route('services.create');
        }
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
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit(int $id)
    {
        $serv = Service::find($id);
        return \view('manage.setting.service.edit', ['service' => $serv]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('services')->ignore($id),
            ],
            'description' => 'required|string',
            'status' => 'required|boolean',
        ])->validated();


        $serv = Service::find($id);
        $serv->name = $request->name;
        $serv->description = $request->description;
        $serv->is_active = $request->status;
        if ($serv->save()){
            return redirect()->route('services.index');
        } else {
            return redirect()->route('services.create');
        }

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
}
