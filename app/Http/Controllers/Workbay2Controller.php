<?php

namespace App\Http\Controllers;

use App\JobCtrlSheet;
use Carbon\Carbon;

class Workbay2Controller extends Controller
{

    public function whois()
    {
        $last = JobCtrlSheet::where('workbay_id', '2')->latest('plate_no')->first();

        return $last;

    }


    public function tin()
    {
        $who = $this->whois();

        $lastplate = $who->plate_no;

        JobCtrlSheet::where('plate_no', $lastplate)
            ->update(['time_in' => Carbon::now('Asia/Manila')->toTimeString()]);

        return $lastplate;
    }


    public function tout1()
    {
        $who = $this->whois();

        $lastid = $who->id;

        JobCtrlSheet::where('id',$lastid)
            ->update(['time_out1'=> Carbon::now('Asia/Manila')->toTimeString()]);

    }

    public function tout2()
    {
        $who = $this->whois();
        $lastid = $who->id;

        JobCtrlSheet::where('id',$lastid)
            ->update(['time_out2'=> Carbon::now('Asia/Manila')->toTimeString()]);
    }
}
