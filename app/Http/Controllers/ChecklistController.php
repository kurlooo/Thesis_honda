<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Http\Resources\ChecklistResource;
use App\JobCtrlSheet;
use App\Queuing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ChecklistController extends Controller
{
    public function export(Request $request)
    {
        $data = $request->all();

//        return $data;

// try url/route?plate_no=wyyww& serviceType=something
        $check = new Checklist([
            'plate_no' => $request->plate_no,
            'cust_name'=> $request->cust_name,
            'engine_no'=> $request->engine_no,
            'model'=> $request->model,
            'color'=> $request->color,
            'job_care' => $request->job_care,
            'battery' => $request->battery,
            'gas' => $request->gas,
            'mileage' => $request->mileage,
            'fleft_tr' => $request->fleft_tr,
            'fleft_con' => $request->fleft_con,
            'fright_tr' => $request->fright_tr,
            'fright_con' => $request->fright_con,
            'rleft_tr' => $request->rleft_tr,
            'rleft_con' => $request->rleft_con,
            'rright_tr' => $request->rright_tr,
            'rright_con' => $request->rright_con,
            'clister_com' => $request->clister_com,
        ]);

        $check->save();
    }

    public function whois()
    {
        $last = Checklist::latest()->first();

        return $last;

    }

    public function comment(Request $request)
    {
        $who = $this->whois();

        $lastplate = $who->plate_no;

        Checklist::where('plate_no', $lastplate)
            ->update(['clister_com' => $request->clister_com]);

        return $lastplate;
    }

    public function plate()
    {
        $last = DB::table('queuing')->select('plate_no')->get();

        return response()->json($last);
    }

    public function cust_name()
    {
        $last = DB::table('queuing')->select('cust_name')->get();

        return response()->json($last);
    }

    public function engine_no()
    {
        $last = DB::table('queuing')->select('engine_no')->get();

        return response()->json($last);
    }

    public function mdl()
    {
        $last = DB::table('queuing')->select('model')->get();

        return response()->json($last);
    }

    public function color()
    {
        $last = DB::table('queuing')->select('color')->get();

        return response()->json($last);
    }

    public function kmread()
    {
        $last = DB::table('queuing')->select('km_reading')->get();

        return response()->json($last);
    }
}
