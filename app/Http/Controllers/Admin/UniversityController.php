<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UniversityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id = '')
    {
        if (!empty($id)) {
            return University::find($id);
        }else{
            $data = University::latest()->get();
            return response()->json(['data' => $data]);
        }
    }

    public function create()
    {
        return view('admin.university.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            $notification = ['status' => false, 'msg' => $validator->errors()];
            return response()->json($notification);
        }
        try {
            if (!empty($request->id)) {
                $data = University::find($request->id);
            } else {
                $data = new University();
            }

            $data->name = $request->name;
            $data->save();
            if (!empty($request->id)) {
                $notification = ['status' => true, 'msg' => 'University update successfully'];
            } else {
                $notification = ['status' => true, 'msg' => 'University save successfully'];
            }
            return response()->json($notification);
        } catch (\Throwable $th) {
            $notification = ['status' => false, 'msg' => $th->getMessage()];
            return response()->json($notification);
        }
    }

    public function destroy($id)
    {
        University::where('id', $id)->first()->delete();
        $notification = ['status' => true, 'msg' => 'University delete successfully'];
        return response()->json($notification);
    }
}
