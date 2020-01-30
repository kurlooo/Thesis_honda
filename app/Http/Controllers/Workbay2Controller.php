<?php

namespace App\Http\Controllers;

use App\JobCtrlSheet;
use Carbon\Carbon;

class Workbay2Controller extends Controller
{

    public function tin1()
    {
        $new = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->first();

        $flg = $new->flag;
        $lastplate = $new->plate_no;

        if($flg==null) {
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate)
                ->whereNull('flag')
                ->update(['time_in1' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag' => '1']);

        }
        elseif($flg=='1'){
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate)
                ->where('flag', '1')
                ->update(['time_in2' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag' => null]);

        }

        return $lastplate;
    }

    public function tout1()
    {
        $new2 = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->first();

        $flg2 = $new2->flag2;
        $lastplate1 = $new2->plate_no;

        if($flg2==null) {
//            $lastplate = $new->plate_no;
            JobCtrlSheet::where('plate_no', $lastplate1)
                ->whereNull('flag2')
                ->update(['time_out1' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag2' => '1',
                    'qc'=> Carbon::now()->subSeconds(10)->toTimeString()]);

            $yes = $this->getDif();

            JobCtrlSheet::where('plate_no', $lastplate1)
                ->whereNotNull('flag2')
                ->update(['total_time' =>$yes]);


        }
        elseif($flg2=='1'){
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate1)
                ->where('flag2', '1')
                ->update(['time_out2' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag2' => null]);


            $hey = $this->toti();

            JobCtrlSheet::where('plate_no', $lastplate1)
                ->whereNull('flag2')
                ->update(['total_time' =>$hey]);

        }

//        return $lastplate1;
    }

    public function getDif()
    {
        $new2 = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->whereNotNull('time_out1')
            ->first();

        $start = Carbon::parse($new2->time_in1);
        $finish = Carbon::parse($new2->time_out1);


        $dur = $finish->diffForHumans($start,true);

        return $dur;
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


        $dur = $finish->diff($start)->format('%H:%i:%s');

        return $dur;
    }

    public function getDif3()
    {
        $new2 = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->whereNotNull('time_out1')
            ->whereNotNull('time_in2')
            ->whereNotNull('time_out2')
            ->first();

        $start2 = Carbon::parse($new2->time_in2);
        $finish2 = Carbon::parse($new2->time_out2);

        $dur2 = $finish2->diff($start2)->format('%H:%i:%s');
//

        return $dur2;
    }

    public function toti()
    {
        $yey = $this->getDif2();

        $yey2 = $this->getdif3();

        $yey3 = strtotime($yey2)-strtotime("00:00:00");

        $yey4= date("H:i:s",strtotime($yey)+$yey3);


        $total = Carbon::parse($yey4);
        $zero = Carbon::parse(strtotime("00:00:00"));


        return $total->diffForHumans($zero,true);
    }
}
