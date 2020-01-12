<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentRequest;
use App\ImageJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AttachmentController extends Controller
{
    public function store(Request $request, int $id)
    {
        $validator = Validator::make(
            [
                'file'      => $request->file('attachment'),
                'extension' => strtolower($request->file('attachment')->getClientOriginalExtension()),
            ],
            [
                'file'      => 'required',
                'extension' => 'required|in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,jpeg,jpg,png,icon,ico,txt,pdf,svg,zip,rar',
            ],
            [
                'extension.in' => 'Valid file formats: doc, csv, xlsx, xls, docx, ppt, odt, ods, odp, jpeg, jpg, png, icon, ico, txt, pdf, svg, zip, rar',
            ]
        );
        if(!$validator->validate()){
            return response()->json($validator->errors(), 422);
        }
        $path = $request->file('attachment')->store('job' . $id, 'public');
        $att = new ImageJob();
        $att->job_id = $id;
        $att->user_id = Auth::id();
        $att->path = $path;
        $att->type = $request->file('attachment')->getClientOriginalExtension();
        $att->description = $request->description;

        if($att->save()){
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    public function getAttachment(int $id)
    {

        $data = ImageJob::where('job_id', $id)->get();
        return response()->json($data, 200);
    }

    public function remove(int $id)
    {
        $img = ImageJob::find($id);
        $del = Storage::disk('public')->delete($img->path);
        if($del){
            $img->delete();
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    public function download(int $id)
    {
        $img = ImageJob::find($id);

        return response()->download(storage_path('app/public/' . $img->path));


    }
}
