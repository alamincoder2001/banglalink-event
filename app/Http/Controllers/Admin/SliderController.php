<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id = '')
    {
        if (!empty($id)) {
            return Slider::find($id);
        }else{
            $data = Slider::latest()->get();
            return response()->json(['data' => $data]);
        }
    }

    public function create()
    {
        return view('admin.slider.create');
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
                $data = Slider::find($request->id);
                $old = $data->image;
            } else {
                $data = new Slider();
            }

            $data->title       = $request->title;
            $data->description = $request->description;
            if ($request->hasFile('image')) {
                if (isset($old)) {
                    if (File::exists($old)) {
                        File::delete($old);
                    }
                }
                $data->image = $this->imageUpload($request, 'image', 'uploads/slider');
            }
            $data->save();
            if (!empty($request->id)) {
                $notification = ['status' => true, 'msg' => 'Slider update successfully'];
            } else {
                $notification = ['status' => true, 'msg' => 'Slider save successfully'];
            }
            return response()->json($notification);
        } catch (\Throwable $th) {
            $notification = ['status' => false, 'msg' => $th->getMessage()];
            return response()->json($notification);
        }
    }

    public function destroy($id)
    {
        Slider::where('id', $id)->first()->delete();
        $notification = ['status' => true, 'msg' => 'Slider delete successfully'];
        return response()->json($notification);
    }
}
