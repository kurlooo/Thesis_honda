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


    public function tin1()
    {
        $who = $this->whois();

        $lastplate = $who->plate_no;
        $now = Carbon::now('Asia/Manila');
        JobCtrlSheet::where('plate_no', $lastplate)
            ->update(['time_in1' => Carbon::now()->subSeconds(10)->toTimeString()]);

//        return $lastplate;
        return $now;
    }

    public function tin2()
    {
        $who = $this->whois();

        $lastplate = $who->plate_no;

        JobCtrlSheet::where('plate_no', $lastplate)
            ->update(['time_in2' => Carbon::now()->subSeconds(10)->toTimeString()]);

        return $lastplate;
    }


    public function tout1()
    {
        $who = $this->whois();

        $lastid = $who->id;

        JobCtrlSheet::where('id',$lastid)
            ->update(['time_out1'=> Carbon::now()->subSeconds(10)->toTimeString()]);

    }

    public function tout2()
    {
        $who = $this->whois();
        $lastid = $who->id;

        JobCtrlSheet::where('id',$lastid)
            ->update(['time_out2'=> Carbon::now('Asia/Manila')->subSeconds(10)->toTimeString()]);
    }
}
