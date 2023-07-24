<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id = '')
    {
        if (!empty($id)) {
            return Gallery::find($id);
        }else{
            $data = Gallery::latest()->get();
            return response()->json(['data' => $data]);
        }
    }

    public function create()
    {
        return view('admin.gallery.create');
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
                $data = Gallery::find($request->id);
                $old = $data->image;
            } else {
                $data = new Gallery();
            }

            $data->title       = $request->title;
            $data->type       = $request->type;
            if ($request->hasFile('image')) {
                if (isset($old)) {
                    if (File::exists($old)) {
                        File::delete($old);
                    }
                }
                $data->image = $this->imageUpload($request, 'image', 'uploads/gallery');
            }
            $data->save();
            if (!empty($request->id)) {
                $notification = ['status' => true, 'msg' => 'Gallery update successfully'];
            } else {
                $notification = ['status' => true, 'msg' => 'Gallery save successfully'];
            }
            return response()->json($notification);
        } catch (\Throwable $th) {
            $notification = ['status' => false, 'msg' => $th->getMessage()];
            return response()->json($notification);
        }
    }

    public function destroy($id)
    {
        Gallery::where('id', $id)->first()->delete();
        $notification = ['status' => true, 'msg' => 'Gallery delete successfully'];
        return response()->json($notification);
    }
}
