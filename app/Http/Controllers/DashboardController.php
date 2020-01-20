<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function ttlveh()
    {
        $count = DB::table('jobctrl')
            ->select(DB::raw('count(*) as tcount'))
//            ->whereDate('created_at', '=', Carbon::today())
//            ->groupBy('workbay_id')
            ->get();

        return $count;
    }


    public function ttlcom()
    {
        $count = DB::table('jobctrl')
            ->select(DB::raw('count(*) as tcount'))
            ->whereNotNull('time_out1')
            ->orwhereNotNull('time_out2')
//            ->whereDate('created_at', '=', Carbon::today())
//            ->groupBy('workbay_id')
            ->get();

        return $count;
    }

    public function ttlrel()
    {
        $count = DB::table('jobctrl')
            ->select(DB::raw('count(*) as tcount'))
            ->whereNotNull('rlsd')
//            ->whereDate('created_at', '=', Carbon::today())
            ->get();

        return $count;
    }
}
