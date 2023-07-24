<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id = '')
    {
        if (!empty($id)) {
            return Event::find($id);
        }else{
            // $data = DB::select('SELECT e.* FROM events e WHERE e.deleted_at IS NULL ORDER BY date(e.dateTime) ASC');
            $data = Event::latest()->get();
            return response()->json(['data' => $data]);
        }
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'venue' => 'required',
            'eventDate' => 'required'
        ], ['eventDate.required' => 'Event dateTime required']);
        if ($validator->fails()) {
            $notification = ['status' => false, 'msg' => $validator->errors()];
            return response()->json($notification);
        }
        try {
            if (!empty($request->id)) {
                $data = Event::find($request->id);
                $old = $data->logo;
            } else {
                $data = new Event();
            }

            $data->venue       = $request->venue;
            $data->eventDate   = $request->eventDate;
            $data->From        = $request->From;
            $data->To          = $request->To;
            $data->description = $request->description;
            if ($request->hasFile('logo')) {
                if (isset($old)) {
                    if (File::exists($old)) {
                        File::delete($old);
                    }
                }
                $data->logo = $this->imageUpload($request, 'logo', 'uploads/event');
            }
            $data->save();
            if (!empty($request->id)) {
                $notification = ['status' => true, 'msg' => 'Event update successfully'];
            } else {
                $notification = ['status' => true, 'msg' => 'Event save successfully'];
            }
            return response()->json($notification);
        } catch (\Throwable $th) {
            $notification = ['status' => false, 'msg' => $th->getMessage()];
            return response()->json($notification);
        }
    }

    public function destroy($id)
    {
        Event::where('id', $id)->first()->delete();
        $notification = ['status' => true, 'msg' => 'Event delete successfully'];
        return response()->json($notification);
    }
}
