<?php

namespace App\Http\Controllers;


use App\Checklist;
use App\JobCtrlSheet;
use App\Queuing;
use App\Testing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Workbay1Controller;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class TestController extends Controller
{

//    public function getime(){
//        $hey = JobCtrlSheet::select
//
//
//    }

    public function test(){

//
        $lol = DB::table('jobctrl')
//            ->sum(DB::raw('TIME_TO_SEC(total_time2)'))
//            ->sum(DB::raw('TIME_TO_SEC(frt2)'))
            ->selectRaw("MONTH(created_at) as mo, (SUM(TIME_TO_SEC(frt2))/SUM(TIME_TO_SEC(total_time2))*100) as effi")
            ->whereMonth('created_at', date('m'))
            ->groupBy('mo')
            ->get();



        return $lol;
//
//        $lol2 = DB::table('jobctrl')
//            ->sum(DB::raw('TIME_TO_SEC(frt2)'));
//////
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

        $tech = DB::table('jobctrl')
            ->selectRaw('DAY(created_at) as day, tech_name, (SUM(TIME_TO_SEC(frt2))/SUM(TIME_TO_SEC(total_time2))*100) as teffi')
            ->whereMonth('created_at', date('m'))
            ->groupBy('tech_name')
            ->groupBy('day')
            ->get();
//
////        $lol2 = DB::table('jobctrl')
////            ->sum(DB::raw('TIME_TO_SEC(frt2)'));
//
        return $tech;
    }

    function decimalHours($time)
    {
        $hms = explode(":", $time);
        return ($hms[0] + ($hms[1]/60) + ($hms[2]/3600));
    }


    function hat(){
        $hey = DB::table('jobctrl')
            ->sum(DB::raw('TIME_TO_SEC(total_time2)'));

        $hey = $hey/3600;
        return $hey;
    }

    public function getDif2()
    {
        $new2 = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->whereNotNull('time_out1')
            ->first();

        $start = Carbon::parse($new2->time_in1);
        $finish = Carbon::parse($new2->time_out1);


        $dur = $finish->diff($start)->format('%H:%I:%S');

        return $dur;
    }

    public function getDif3()
    {
        $new2 = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->whereNotNull('time_out1')
            ->orwhereNotNull('time_in2')
            ->orwhereNotNull('time_out2')
            ->first();

        $start2 = Carbon::parse($new2->time_in2);
        $finish2 = Carbon::parse($new2->time_out2);

        $dur2 = $finish2->diff($start2)->format('%H:%I:%S');
//

        return $dur2;
    }

    public function toti()
    {
        $yey = $this->getDif2();

        $yey2 = $this->getDif3();

        $yey3 = strtotime($yey2)-strtotime("00:00:00");

        $yey4= date("H:i:s",strtotime($yey)+$yey3);


        $total = Carbon::parse($yey4);
//        $zero = Carbon::parse(strtotime("00:00:00"));


//        return $total->diff($zero)->format('%H:%I:%S');

        return $total;
    }

    public function toti1()
    {
        $yey = $this->getDif2();

        $yey2 = $this->getDif3();

        $yey3 = strtotime($yey2)-strtotime("00:00:00");

        $yey4= date("H:i:s",strtotime($yey)+$yey3);


//        $total = Carbon::parse($yey4);
        $zero = Carbon::parse(strtotime("00:00:00"));


        return $zero;
    }

}
