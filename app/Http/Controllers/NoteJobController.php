<?php

namespace App\Http\Controllers;

use App\Job;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteJobController extends Controller
{
    public function store(Request $request, int $id)
    {
        $request->validate(['text' => 'required|string']);
        $job = Job::find($id);

        $note = new Note();
        $note->user_id = Auth::id();
        $note->text = $request->text;
        $note->job_id = $job->id;
        $note->save();

        return response()->json(['created_at' => $note->created_at,
                                    'userName' => $note->user->name,
                                    'text' => $note->text,
                                    'id' => $note->id,
                                    'url' => route('note.delete', $note->id)], 200);

    }

    public function delete(Request $request, int $id)
    {
        if (Note::find($id)->delete()){
            return response()->json(true,
                                    200);
        } else {
            return response()->json(false,
                                    500);
        }

    }
}
