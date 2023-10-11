<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ExampleRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function AdminLogout()
    {
        Auth::guard("admin")->logout();
        return redirect("/admin");
    }
}
