<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\ExampleRegister;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $registers = ExampleRegister::all();
        $events = Event::all();
        return view("admin.dashboard", compact('registers', 'events'));
    }

    public function registerList()
    {
        $registers = ExampleRegister::latest()->get();
        return view('admin.register.registerlist', compact('registers'));
    }

    public function registerDestroy($id)
    {
        ExampleRegister::where('id', $id)->first()->delete();
        return "Delete register successfully";
    }

    public function AdminLogout()
    {
        Auth::guard("admin")->logout();
        return redirect("/admin");
    }
}
