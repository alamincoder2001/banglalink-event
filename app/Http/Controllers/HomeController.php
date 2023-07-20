<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExampleRegister;

class HomeController extends Controller
{
    public function index()
    {
        return view('website');
    }

    public function ExampleReg(Request $request)
    {
        
        try {
            $this->validate($request, [
                'name' => 'required|max:100',
                'phone' => 'required|unique:example_registers,phone|digits:11',
                'email' => 'required|email|unique:example_registers,email|max:100',
                'address' => 'required|max:255',
            ]);

            $rFormat                  = date('y') . '01';
            $register                 = new ExampleRegister();
            $register->registrationID = $this->generateCode("ExampleRegister", $rFormat);
            $register->name           = $request->name;
            $register->phone          = $request->phone;
            $register->email          = $request->email;
            $register->university     = $request->university;
            $register->address        = $request->address;
            $register->save();

            $notification = array(
                'message' => 'Register Successfully',
                'msg_type' => true,
                'lastId' => $register->id
            );
            return $notification;
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'msg_type' => false
            );
        }
    }

    public function registerComplete($id)
    {
        $data = ExampleRegister::where('id', $id)->first();
        return view('registerview', compact('data'));
    }
}
