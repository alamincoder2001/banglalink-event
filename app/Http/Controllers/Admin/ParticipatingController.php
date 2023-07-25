<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Participating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ParticipatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id = '')
    {
        if (!empty($id)) {
            return Participating::find($id);
        }else{
            $data = Participating::latest()->get();
            return response()->json(['data' => $data]);
        }
    }

    public function create()
    {
        return view('admin.participant.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = ['status' => false, 'msg' => $validator->errors()];
            return response()->json($notification);
        }
        try {
            if (!empty($request->id)) {
                $data = Participating::find($request->id);
                $old = $data->image;
            } else {
                $data = new Participating();
            }

            $data->title = $request->title;
            $data->type  = $request->type;
            $data->url   = $request->url;
            if ($request->hasFile('image')) {
                if (isset($old)) {
                    if (File::exists($old)) {
                        File::delete($old);
                    }
                }
                $data->image = $this->imageUpload($request, 'image', 'uploads/participant');
            }
            $data->save();
            if (!empty($request->id)) {
                $notification = ['status' => true, 'msg' => 'Participant update successfully'];
            } else {
                $notification = ['status' => true, 'msg' => 'Participant save successfully'];
            }
            return response()->json($notification);
        } catch (\Throwable $th) {
            $notification = ['status' => false, 'msg' => $th->getMessage()];
            return response()->json($notification);
        }
    }

    public function destroy($id)
    {
        Participating::where('id', $id)->first()->delete();
        $notification = ['status' => true, 'msg' => 'Participant delete successfully'];
        return response()->json($notification);
    }
}