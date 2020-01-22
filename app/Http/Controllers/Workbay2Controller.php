<?php

namespace App\Http\Controllers;

use App\JobCtrlSheet;
use Carbon\Carbon;

class Workbay2Controller extends Controller
{

    public function tin1()
    {
        $new3 = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->first();

        $flg3 = $new3->flag;
        $lastplate3 = $new3->plate_no;

        if($flg3==null) {
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate3)
                ->whereNull('flag')
                ->update(['time_in1' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag' => '1']);

        }
        elseif($flg3=='1'){
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate3)
                ->where('flag', '1')
                ->update(['time_in2' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag' => null]);

        }

        return $lastplate3;
    }

    public function tout1()
    {
        $new4 = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->first();

        $flg4 = $new4->flag2;
        $lastplate4 = $new4->plate_no;

        if($flg4==null) {
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate4)
                ->whereNull('flag2')
                ->update(['time_out1' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag2' => '1',
                    'qc'=> Carbon::now()->subSeconds(10)->toTimeString()]);

        }
        elseif($flg4=='1'){
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate4)
                ->where('flag2', '1')
                ->update(['time_out2' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag2' => null]);

        }

        return $lastplate4;
    }
}
