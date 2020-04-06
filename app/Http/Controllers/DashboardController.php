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
            ->whereDate('created_at', '=', Carbon::today())
//            ->groupBy('workbay_id')
            ->get();

        return $count;
    }


    public function ttlcom()
    {
        $count = DB::table('jobctrl')
            ->select(DB::raw('count(*) as tcount'))
            ->whereDate('created_at', '=', Carbon::today())
            ->whereNotNull('time_out1')
            ->orwhereNotNull('time_out2')
//            ->groupBy('workbay_id')
            ->get();

        return $count;
    }

    public function ttlrel()
    {
        $count = DB::table('jobctrl')
            ->select(DB::raw('count(*) as tcount'))
            ->whereNotNull('rlsd')
            ->whereDate('created_at', '=', Carbon::today())
            ->get();

        return $count;
    }

    public function ttleff()
    {
//        $lol = DB::table('jobctrl')
//            ->sum(DB::raw('TIME_TO_SEC(total_time2)'));
//
//        $lol2 = DB::table('jobctrl')
//            ->sum(DB::raw('TIME_TO_SEC(frt2)'));
////
//        //convert into hours(decimal)
//        $lel = floatval($lol/3600); //total
//        $lel2 = floatval($lol2/3600); //frt
//        $hun = floatval(100); //100 percent
////        echo "$lol <br>";
////        echo "$lol2 <br>";
////        echo "$hun <br>";
//
//        $hat = bcdiv("$lel2","$lel",2);
////        echo "$hat <br>";
//
//        return bcmul("$hat","$hun",2); //percent

//        $lol = DB::table('jobctrl')
//            ->selectRaw("DATE(created_at) as date, (SUM(TIME_TO_SEC(frt2))/(SUM(hour)+SUM(min))*100) as effi")
////            ->whereDay('created_at',date('d'))
////            ->whereMonth('created_at', date('m'))
//            ->whereYear('created_at', date('Y'))
//            ->groupBy('date')
//            ->get();

        //MONTHLY
//        $lol = DB::table('jobctrl')
//            ->selectRaw("DATE(created_at) as date, (SUM(TIME_TO_SEC(frt2))/SUM(TIME_TO_SEC(total_time2))*100) as effi")
//            ->whereYear('created_at', date('Y'))
//            ->groupBy('date')
//            ->get();

        $lol = DB::table('jobctrl')
            ->selectRaw("DATE(created_at) as date, (((SUM(hour)*3600)+(SUM(min)*60))/SUM(TIME_TO_SEC(total_time2)))*100 as effi")
//            ->selectRaw("((SUM(min))/60)")

            //            ->whereDay('created_at',date('d'))
//            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('date')
            ->get();

        return $lol;
    }

    public function ttltech()
    {
        $tech = DB::table('jobctrl')
            ->selectRaw('tech_name, (((SUM(hour)*3600)+(SUM(min)*60))/SUM(TIME_TO_SEC(total_time2)))*100 as teffi')
//            ->whereMonth('created_at', date('m'))
            ->groupBy('tech_name')
//            ->groupBy(DB::raw('MONTH(NOW())'))
            ->get();

        return $tech;
    }

}
