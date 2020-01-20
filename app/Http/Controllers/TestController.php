<?php

namespace App\Http\Controllers;


use App\JobCtrlSheet;
use App\Queuing;
use App\Testing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function test()
    {
        $count = DB::table('jobctrl')
            ->select(DB::raw('count(*) as tcount'))
            ->whereNotNull('rlsd')
//            ->whereDate('created_at', '=', Carbon::today())
            ->get();

        return $count;
    }
//
//        foreach ($count as $row){
//            $count['label'][] = $row->workbay_id;
//            $count['data'][] = (int) $row->tcount;
//        }
//
//        $count['workbay_data'] = json_encode($count);
//        return view('dashboard',$count);
}
