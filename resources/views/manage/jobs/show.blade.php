@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <div class="card mb-3">
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-4 text-left">
                        <h3>{{$job->service->name}} <small class="text-muted">#{{$job->id}}</small></h3>
                        <p>Job for <a href="{{ route('contacts.show', $job->contact_id) }}">{{$job->contact->name}}</a>
                        </p>
                        <p>{{$job->contact->address_address}}</p>

                        <a class="fa-link" data-toggle="collapse" href="#scope" role="button"
                           aria-expanded="false" aria-controls="multiCollapseExample1">
                            Scope of Work
                        </a>
                        <div class="collapse multi-collapse" id="scope">
                            <p> {{$job->scope_of_work}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4 text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">Left</button>
                            <button type="button" class="btn btn-secondary">Middle</button>
                            <button type="button" class="btn btn-secondary">Right</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <ul class="nav nav-pills justify-content-end small">
                    <li class="nav-item dropdown">
                        <a class="btn btn-sm dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">Add</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Note</a>
                            <a class="dropdown-item" href="#">Attachments</a>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group">
                            <a class="btn btn-sm" href="{{ route('jobs.edit', $job->id) }}">Edit Job</a>
                            <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split"
                                    id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" data-reference="parent">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                <a class="dropdown-item" href="#">Delete Job</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header ">
                <div class="row">
                        <div  class="text-left col-6">
                            <b>Schedule</b>
                        </div>
                       <div class="text-right col-6">
                           <a  class="btn btn-sm" href="#">
                               Add Event
                           </a>
                       </div>
                </div>

            </div>
            <div class="card-body "><!--card-body  START-->

                <div class="new-task-click-toggle" id="new_task_section" style="">
                    <form class="task_form record first" id="new_task" action="/denverappliance/tasks" accept-charset="UTF-8" data-remote="true" method="post">
                        <input name="utf8" type="hidden" value="✓">
                        <input type="hidden" name="authenticity_token" value="KZDL+c9W85HiV5dyk2wZ1X8HE1tReQ5Kt+4YibskQj7MQe6EvY9CS7nTQq6rpDLgduIF/YeKKoWriIBP7gBJaA==">

                        <table class="table new-task-table table-block">
                            <thead>
                                <tr>
                                    <th style="width: 26.5%">Date</th>
                                    <th style="width: 28.5%">Description</th>
                                    <th style="width: 20%">Task Type</th>
                                    <th colspan="2" style="">Assigned To</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr class="mobile-labeled">
                                <td>
                                    <input value="27151656" type="hidden" name="task[job_id]" id="task_job_id">

                                    <div class="mobile-table-label visible-xs">Date</div>

                                    <!-- DATE Picker START -->


                                    <input type='text' name="text" id='timepicker-actions-exmpl' />
                                    <div class="datepicker-here" data-timepicker="true" data-time-format='hh:ii aa '></div>

                                  <input type="text" data-timepicker="true" data-time-format="hh:ii aa" class="datepicker-here">

                                    <script>
                                        // Зададим стартовую дату
                                        var start = new Date(),
                                            prevDay,
                                            startHours = 9;

                                        // 09:00
                                        start.setHours(9);
                                        start.setMinutes(0);

                                        // Если сегодня суббота или воскресенье - 10:00
                                        if ([6,0].indexOf(start.getDay()) != -1) {
                                            start.setHours(10);
                                            startHours = 10
                                        }

                                        $('#timepicker-actions-exmpl').datepicker({
                                            timepicker: true,
                                            startDate: start,
                                            minHours: startHours,
                                            maxHours: 18,


                                            onSelect: function(fd, d, picker) {
                                                // Ничего не делаем если выделение было снято
                                                if (!d) return;

                                                var day = d.getDay();

                                                // Обновляем состояние календаря только если была изменена дата
                                                if (prevDay != undefined && prevDay == day) return;
                                                prevDay = day;

                                                // Если выбранный день суббота или воскресенье, то устанавливаем
                                                // часы для выходных, в противном случае восстанавливаем начальные значения
                                                if (day == 6 || day == 0) {
                                                    picker.update({
                                                        minHours: 10,
                                                        maxHours: 16
                                                    })
                                                } else {
                                                    picker.update({
                                                        minHours: 9,
                                                        maxHours: 18
                                                    })
                                                }
                                            }
                                        })
                                    </script>

                                    <!-- DATE Picker END -->

                                </td>
                                <td>
                                    <div class="mobile-table-label visible-xs">Description</div>
                                    <textarea class="form-control input-sm" id="task_description" placeholder="Describe the event" cols="40" rows="1" name="task[name]" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 48px;">

                                    </textarea>
                                </td>
                                <td>
                                    <div class="mobile-table-label visible-xs">Task Type</div>
                                    <select name="task[task_type_id]" id="task_task_type_id" class="form-control input-sm">
                                        @foreach($eventType as $type)

                                        <option value="{{$type->id}}">{{$type->name}}</option>

                                        @endforeach
                                    </select>
                                </td>
                                <td colspan="2">
                                    <div class="mobile-table-label visible-xs">Assigned to</div>
                                    <div class="assign-employee-list">
                                        <ul class="list-unstyled" id="assignments">
                                            <li>
                                                <div class="custom-select-form">
                                                    <select name="task[employee_ids][]" id="task_employee_ids_" class="form-control input-sm select-technician">

                                                        @foreach($user as $users)
                                                        <option value="{{$users->id}}">{{$users->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    <a class="delete-assignment-list-btn tooltipped" href="#" title="" data-original-title="Remove employee">
                                                        <i class="fa fa-minus-square text-danger"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                        <a class="tooltipped add-assignment-list" id="assign_tech" href="" title="" data-original-title="Add employee">
                                            <i class="fa fa-plus-square text-success"></i>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td class="no-border" colspan="4">
                                    <input type="submit" name="commit" value="Add Event" class="potential_recurrable_item btn btn-sm btn-success " disable_with="Saving.." data-disable-with="Add Event">
                                    <a class="cancel-new-task btn btn-sm btn-link" style="margin: 4px 10px 0 0" data-dismiss="modal" href="#">cancel</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </form>
                </div>


            </div><!--card-body  END -->
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <b>Notes</b>
            </div>
            <div class="card-body ">
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <b>Attachments</b>
            </div>
            <div class="card-body ">
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <b>Job History</b>
            </div>

            <ul class="list-group list-group-flush">
                @foreach($job->history as $h)
                    <li class="list-group-item">
                        <small>{{$h->created_at}}</small>
                        <p><b>{{$h->user->name}}</b> {{$h->action}} {{$h->component}}
                            #{{$h->job_id}} {{$h->job->service->name}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection