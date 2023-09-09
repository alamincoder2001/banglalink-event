<?php

namespace App\Http\Controllers;

use App\Mail\RegisterTicket;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\ExampleRegister;
use App\Models\Gallery;
use App\Models\Participating;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('eventDate', 'asc')->get();
        $participants = Participating::where('type', 'image')->latest()->get();
        $galleries = Gallery::where('type', 'image')->latest()->get();
        return view('website', compact('events', 'participants', 'galleries'));
    }

    public function ExampleRegShow($name=null)
    {
        return view('register', compact('name'));
    }

    public function ExampleReg(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'phone' => 'required|unique:example_registers,phone|digits:11',
            'email' => 'required|email|unique:example_registers,email|max:100',
            'address' => 'required|max:255',
            'university' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => $validator->errors(),
                'msg_type' => false,
            );
            return response()->json($notification);
        }

        try {

            $rFormat                  = date('y') . '01';
            $register                 = new ExampleRegister();
            $register->registrationID = $this->generateCode("ExampleRegister", $rFormat);
            $register->name           = $request->name;
            $register->slug           = $this->make_slug(date('Y-m-d h:i:s') . ' ' . $request->name);
            $register->phone          = $request->phone;
            $register->email          = $request->email;
            $register->university     = $request->university;
            $register->address        = $request->address;
            $register->save();

            // Mail::to($request->email)->send(new RegisterTicket($register));

            $notification = array(
                'message' => 'Register Successfully',
                'msg_type' => true,
                'slug' => $register->slug
            );
            return $notification;
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'msg_type' => false
            );
        }
    }

    public function registerComplete($slug)
    {
        $data = ExampleRegister::where('slug', $slug)->first();
        if (!empty($data)) {
            return view('registerview', compact('data'));
        } else {
            return view('website');
        }
    }

    public function rePrint(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:11',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => $validator->errors(),
                'msg_type' => false,
            );
            return response()->json($notification);
        }

        try {
            $check = ExampleRegister::where("phone", $request->phone)->first();
            if (!empty($check)) {
                $notification = array(
                    'message' => 'Register Found',
                    'msg_type' => true,
                    'slug' => $check->slug
                );
            }else{
                $notification = array(
                    'message' => ['phone' => 'Register Not Found'],
                    'msg_type' => false,
                );

            }
            return $notification;
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'msg_type' => false
            );
        }
    }

    public function eventDetails($id) 
    {
        $event = Event::find($id);
        return view('event_details', compact('event'));
    }

    public function gallery() 
    {
        $galleries = Gallery::latest()->get();
        return view('gallery', compact('galleries'));
    }
    
    public function participant() 
    {
        $participants = Participating::latest()->get();
        return view('participant', compact('participants'));
    }
}
