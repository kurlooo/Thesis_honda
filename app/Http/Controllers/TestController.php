<?php

namespace App\Http\Controllers;


use App\Queuing;
use App\Testing;
use Carbon\Carbon;
use Illuminate\Http\Request;


class TestController extends Controller
{

    public function export(Request $request)
    {
//        $data = $request->all();

//        return $data;

        $test = new Testing([
            'plate_no' => $request->plate_no,
            'workbay_id' =>$request->workbay_id,
        ]);
//
//
        $test->save();
//
//        $lastplate = $test->plate_no;
//
//        return $lastplate;
    }

    public function whois()
    {
        $last = Testing::where('workbay_id', '1')->latest('plate_no')->first();

        return $last;

    }

    public function tin()
    {
        $who = $this->whois();

        $lastplate = $who->plate_no;

        Testing::where('plate_no', $lastplate)
            ->update(['time_in' => Carbon::now('Asia/Manila')->toTimeString()]);

        return $lastplate;
    }


    public function tout1()
    {
        $who = $this->whois();

        $lastid = $who->id;

        Testing::where('id',$lastid)
                ->update(['time_out1'=> Carbon::now('Asia/Manila')->toTimeString()]);

    }

    public function tout2()
    {
        $who = $this->whois();
        $lastid = $who->id;

        Testing::where('id',$lastid)
            ->update(['time_out2'=> Carbon::now('Asia/Manila')->toTimeString()]);
    }


    public function dropdown()
    {
        $last = Queuing::first();

        $lastplate = $last->plate_no;

        return $lastplate;
    }
}
