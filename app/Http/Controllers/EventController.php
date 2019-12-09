<?php

namespace App\Http\Controllers;

use App\EventType;
use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index(Request $request){


        $events = new Event();

        $from = $request->from;
        $to = $request->to;

        return response()->json([
            "data" => $events->
            where("start_date", "<", $to)->
            where("end_date", ">=", $from)->get()
        ]);

    }

    public function store(Request $request){

        $event = new Event();


        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->text = strip_tags($request->text);
        $event->save();
        $event->staff()->sync($request->id, false);

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
        $event->save();

        return response()->json([
            "action"=> "updated"
        ]);
    }

    public function destroy($id){
        $event = Event::find($id);
        $event->delete();

        return response()->json([
            "action"=> "deleted"
        ]);
    }
}
