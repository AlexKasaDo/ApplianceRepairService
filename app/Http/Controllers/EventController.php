<?php

namespace App\Http\Controllers;

use App\EventType;
use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{

    public function index(Request $request){


        //$events = new Event();

        $events = Event::with('staff');



        $from = $request->from;
        $to = $request->to;
        $staffId = $request->staff_id;


        return response()->json([
            "data" => $events->
            where("start_date", "<", $to)->
            where("end_date", ">=", $from)->get()
        ]);

    }

    public function store(Request $request){

        $event = new Event();

       if(isset($request->type_id)) {
           $request->type_id;
       }else{
            $request->type_id=2;
       };

        $event->start_date =  date("Y-m-d H:i:s",strtotime($request->start_date));
        $event->end_date = date("Y-m-d H:i:s",strtotime( $request->end_date));
        $event->text = strip_tags($request->text);
        $event->type_id = strip_tags($request->type_id);
        $event->save();
        $event->staff()->sync($request->assigned, true);

        return response()->json([
            "action"=> "inserted",
            "tid" => $event->id
        ]);
    }

    public function update($id, Request $request){
        $event = Event::find($id);

        $event->text = strip_tags($request->text);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->type_id = strip_tags($request->type_id);
        $event->save();
        $event->staff()->sync($request->assigned, true);

        return response()->json([
            "action"=> "updated"
        ]);
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
