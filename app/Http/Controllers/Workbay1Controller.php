<?php

namespace App\Http\Controllers;

use App\JobCtrlSheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Workbay1Controller extends Controller
{

    public function tin1()
    {
        $new = JobCtrlSheet::where('workbay_id','1')
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
        $new2 = JobCtrlSheet::where('workbay_id','1')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->first();

        $flg2 = $new2->flag2;
        $lastplate1 = $new2->plate_no;

        if($flg2==null) {
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate1)
                ->whereNull('flag2')
                ->update(['time_out1' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag2' => '1',
                    'qc'=> Carbon::now()->subSeconds(10)->toTimeString()]);

        }
        elseif($flg2=='1'){
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate1)
                ->where('flag2', '1')
                ->update(['time_out2' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag2' => null]);

        }

        return $lastplate1;
    }

}
