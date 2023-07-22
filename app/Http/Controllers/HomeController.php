<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExampleRegister;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('website');
    }

    public function ExampleReg(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'phone' => 'required|unique:example_registers,phone|digits:11',
            'email' => 'required|email|unique:example_registers,email|max:100',
            'address' => 'required|max:255',
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
            $register->slug           = $this->make_slug(date('Y-m').' '.$request->name);
            $register->phone          = $request->phone;
            $register->email          = $request->email;
            $register->university     = $request->university;
            $register->address        = $request->address;
            $register->save();

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
        }else{
            return redirect('/');
        }
    }
}
