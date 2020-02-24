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
        $flg2 = $new->flag2;
        $hey = $new->time_in1;
        $hey2 = $new->time_out1;
        $hoy = $new->time_in2;
        $hoy2 = $new->time_out2;

        if($flg==null) {
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate)
                ->whereNull('flag')
                ->update(['time_in1' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag' => '1']);


            $hat = $this->getfrt();

            JobCtrlSheet::where('plate_no', $lastplate)
                ->where('flag', '1')
                ->whereNotNull('time_in1')
                ->update(['frt2' => $hat]);
        }
        elseif($flg=='1'){
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate)
                ->where('flag', '1')
                ->whereNotNull('time_out1')
                ->update(['time_in2' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag' => null]);

        }

        echo "$lastplate <br>";


        if($flg='1' and $hey!=null and is_null($hey2)){
            return redirect()->route('jobctrl.index')->with('error','Error. You have a duplicate bay code.');
        }
        elseif ($flg='1' and $flg2='1' and $hoy!=null and is_null($hoy2)){
            return redirect()->route('jobctrl.index')->with('error','Error. You have a duplicate bay code.');
        }

        return redirect()->route('jobctrl.index');
    }

    public function tout1()
    {
        $new2 = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->orWhereNull('flag2')
            ->first();

        if(is_null($new2->flag2) and is_null($new2->time_out1) and is_null($new2->time_in1)) {
            return redirect()->route('jobctrl.index')->with('error', 'Error. Time in1 is not yet supplied.');
        }
        elseif(($new2->flag2!=null) and is_null($new2->time_in2) and is_null($new2->time_iout2)){
            return redirect()->route('jobctrl.index')->with('error','Error. Time in2 is not yet supplied.');
        }
        elseif(($new2->flag2==null) and ($new2->flag!=null) and ($new2->time_in2!=null) and ($new2->time_out2!=null)){
            return redirect()->route('jobctrl.index')->with('error','Error. You have a duplicate bay code.');
        }

        $flg2 = $new2->flag2;
        $lastplate1 = $new2->plate_no;

        if($flg2==null) {
//            $lastplate = $new->plate_no;
            JobCtrlSheet::where('plate_no', $lastplate1)
                ->whereNull('flag2')
                ->update(['time_out1' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag2' => '1',
                    'qc'=> Carbon::now()->subSeconds(10)->toTimeString()]);

            $yes = $this->getDif();
            $yes2 = $this->getDif1();

            JobCtrlSheet::where('plate_no', $lastplate1)
                ->whereNotNull('flag2')
                ->update(['total_time' =>$yes, 'total_time2'=>$yes2]);


        }
        elseif($flg2=='1'){
//            $lastplate = $new->plate_no;

            JobCtrlSheet::where('plate_no', $lastplate1)
                ->where('flag2', '1')
                ->update(['time_out2' => Carbon::now()->subSeconds(10)->toTimeString(), 'flag2' => null]);


            $hey = $this->toti();
            $hey2 = $this->toti1();

            JobCtrlSheet::where('plate_no', $lastplate1)
                ->whereNull('flag2')
                ->whereNotNull('time_out2')
                ->update(['total_time' =>$hey, 'total_time2'=>$hey2]);

        }

                return redirect()->route('jobctrl.index');
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


        $dur = $finish->diffForHumans($start,true,false,3);

        return $dur;
    }

    public function getDif1()
    {
        $new2 = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->whereNotNull('time_out1')
            ->first();

        $start = Carbon::parse($new2->time_in1);
        $finish = Carbon::parse($new2->time_out1);


        $durr = $finish->diff($start)->format('%H:%i:%s');

        return $durr;
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

        $yey2 = $this->getDif3();

        $yey3 = strtotime($yey2)-strtotime("00:00:00");

        $yey4= date("H:i:s",strtotime($yey)+$yey3);


        $total = Carbon::parse($yey4);
        $zero = Carbon::parse(strtotime("00:00:00"));


        return $total->diffForHumans($zero,true,false,3);

    }

    public function toti1()
    {
        $yey = $this->getDif2();

        $yey2 = $this->getDif3();

        $yey3 = strtotime($yey2)-strtotime("00:00:00");

        $yey4= date("H:i:s",strtotime($yey)+$yey3);


        $total = Carbon::parse($yey4);
        $zero = Carbon::parse(strtotime("00:00:00"));


        return $total->diff($zero)->format('%H:%i:%s');
    }

    public function getfrt(){
        $lol = JobCtrlSheet::where('workbay_id','2')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->first();

        $min = Carbon::parse($lol->time_in1);
        $max = Carbon::parse($lol->frt);

        return $max->diff($min)->format('%H:%i:%s');

    }
}
