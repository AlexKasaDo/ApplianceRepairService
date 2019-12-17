<?php

namespace App\Http\Controllers;

use App\ImageJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function store(Request $request, int $id)
    {
        $path = $request->file('attachment')->store('job'.$id, 'public');
        $att = new ImageJob();
        $att->job_id = $id;
        $att->user_id = Auth::id();
        $att->path = $path;
        $att->description = $request->description;

        if($att->save()){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }

    public function getAttachment(int $id)
    {

        $data = ImageJob::where('job_id',$id)->get();
        return response()->json($data,200);
    }

    public function remove(int $id)
    {
        $img = ImageJob::find($id);
        $del = Storage::disk('public')->delete($img->path);
        if ($del){
            $img->delete();
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }

    public function download(int $id)
    {
        $img = ImageJob::find($id);
        if ($img){
            return response()->download(storage_path('app/public/'.$img->path));
        }

    }
}
