<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\ExampleRegister;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $registers = ExampleRegister::get();
        $today = date('Y-m-d');
        $todayreg = DB::select("SELECT er.* FROM example_registers er WHERE DATE_FORMAT(er.created_at, '%Y-%m-%d') = '$today'");
        $events = Event::get();
        return view("admin.dashboard", compact('registers', 'events', 'todayreg'));
    }

    public function registerList()
    {
        return view('admin.register.registerlist');
    }

    public function registerDestroy($id)
    {
        ExampleRegister::where('id', $id)->first()->delete();
        return "Delete register successfully";
    }


    public function searchRegister(Request $request)
    {

        $cluase = "";

        if (!empty($request->dateFrom) && !empty($request->dateTo)) {
            $cluase .= "AND DATE_FORMAT(er.created_at, '%Y-%m-%d') BETWEEN '$request->dateFrom' AND '$request->dateTo'";
        }

        $data = DB::select("SELECT
                    er.*,
                    ns.name as ennovator_name,
                    dg.name as degree_name
                FROM example_registers er
                LEFT JOIN enovator_sources ns ON ns.id = er.ennovator_source
                LEFT JOIN degrees dg ON dg.id = er.typeof_degree WHERE 1 = 1 $cluase");
        return response()->json(['data' => $data]);
    }

    public function getGraphData()
    {
        $month = date("m");
        $year = date("Y");
        $dayNumber = date('t', mktime(0, 0, 0, $month, 1, $year));

        // monthly record
        $monthlyRecord = [];
        for ($i = 1; $i <= $dayNumber; $i++) {
            $date = $year . '-' . $month . '-' . sprintf("%02d", $i);
            $query = DB::select("SELECT 
                    count(*) AS total
                    FROM example_registers er
                    WHERE DATE_FORMAT(er.created_at, '%Y-%m-%d') = ?", [$date]);

            $total = (float)$query[0]->total;

            $daywisecount = [sprintf("%02d", $i), $total];
            array_push($monthlyRecord, $daywisecount);
        }

        return response()->json([
            'monthly_record'    => $monthlyRecord,
        ]);
    }

    // admin profile updated
    public function profileIndex()
    {
        $data = Auth::guard('admin')->user();
        return view("admin.profile", compact('data'));
    }

    public function profileUpdate(Request $request)
    {
        try {
            $admin = Auth::guard('admin')->user();
            if (!empty($request->old_password) || !empty($request->new_password) || !empty($request->confrim_password)) {
                $validator = Validator::make($request->all(), [
                    "name"             => "required",
                    "username"         => "required|unique:admins,username," . $admin->id,
                    "email"            => "required|unique:admins,email," . $admin->id,
                    "old_password"     => "required",
                    "new_password"     => "required",
                    'confirm_password' => 'required_with:new_password|same:new_password'
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    "name"     => "required",
                    "username" => "required|unique:admins,username," . $admin->id,
                    "email"    => "required|unique:admins,email," . $admin->id,
                ]);
            }

            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors()]);
            }

            $data = Admin::find($admin->id);
            if (!empty($request->old_password) || !empty($request->new_password) || !empty($request->confrim_password)) {
                if (Hash::check($request->old_password, $admin->password)) {
                    $data->password = Hash::make($request->new_password);
                } else {
                    return response()->json(["errors" => "Old password does not match"]);
                }
            }
            $data->name = $request->name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->save();
            return "Admin Profile Updated";
        } catch (\Throwable $e) {
            return "Something went wrong";
        }
    }

    public function imageUpdate(Request $request)
    {
        try {

            $admin = Auth::guard('admin')->user();

            $validator = Validator::make($request->all(), [
                "image" => "mimes:jpg,png,jpeg|dimensions:width=200,height=200"
            ], ["image.dimensions" => "Image dimension must be (200 x 200)"]);

            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors()]);
            }
            $data = Admin::find($admin->id);
            $old = $data->image;

            if (!empty($old) && isset($old)) {
                if (File::exists($old)) {
                    File::delete($old);
                }
            }
            $data->image = $this->imageUpload($request, 'image', 'uploads/admins') ?? '';

            $data->save();
            return "Image Upload successfully";
        } catch (\Throwable $e) {
            return "Something went wrong";
        }
    }

    public function AdminLogout()
    {
        Auth::guard("admin")->logout();
        return redirect("/admin");
    }
}
