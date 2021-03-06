<?php

namespace App\Http\Controllers;

use App\EventType;
use App\Job;
use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function show(int $id)
    {

        return response()->json(Event::with('staff')->where('job_id',$id)->get(),200);
    }

    public function index(Request $request){

        //$events =  Event::with('staff');
        $events = Event::with('staff')->get() ;


        $from = $request->from;
        $to = $request->to;

        function base ($events){
            $items = array();
            $count = 0;

            foreach ($events  as $event=>$value) {


                if ($value['staff']){

                    foreach ($value['staff']  as $staffItem){

                        $staffId = $staffItem['id'];
                    }

                }else {
                    $staffId = 'unassigned';
                }

                $items[$count] = [
                    "id" => $value['id'],
                    "type_id" => $value['type_id'],
                    "start_date" => $value['start_date'],
                    "end_date" => $value['end_date'],
                    "text" => $value['text'],
                    "created_at" => $value['created_at'],
                    "updated_at" => $value['updated_at'],
                    "staff" => "$staffId",

                ];


                $count++;


            }

            return $items;
        }

        $events =  base((object)$events);

        return response()->json([
            "data" =>  $events
        ]);





    }

    public function store(Request $request){

        $event = new Event();


       if(isset($request->type_id)) {
           $request->type_id;
       }else{
            $request->type_id=2;
       };

        if(isset($request->job_id)) {
            $request->job_id;
        }else{
            $request->job_id=0;
        };



        $event->start_date =  date("Y-m-d H:i:s",strtotime($request->start_date));
        $event->end_date = date("Y-m-d H:i:s",strtotime( $request->end_date));
        $event->text = strip_tags($request->text);
        $event->type_id = strip_tags($request->type_id);
        $event->job_id = strip_tags($request->job_id);
        $event->save();
        $event->staff()->sync($request->assigned, true);

        return response()->json(Event::with('staff')->where('job_id',$event->job_id )->get(),200);
    }

    public function update($id, Request $request){

        $event = Event::find($id);

        $event->text = strip_tags($request->text);
        $event->start_date = date("Y-m-d H:i:s",strtotime($request->start_date));
        $event->end_date = date("Y-m-d H:i:s",strtotime( $request->end_date));
        $event->type_id = strip_tags($request->type_id);
        $event->save();
        $event->staff()->sync($request->assigned, true);

        return response()->json(true);
    }

    public function destroy($id){
        $event = Event::find($id);
        $event->staff()->sync([]);
        $event->delete();



        return response()->json([
            "action"=> "deleted"
        ]);
    }
}
