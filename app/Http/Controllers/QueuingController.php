<?php

namespace App\Http\Controllers;

use App\Queuing;
use Illuminate\Http\Request;

class QueuingController extends Controller
{
    public function export(Request $request)
    {
        $data = $request->all();

        $queue = new Queuing([
            'plate_no' => $request->plate_no,
            'queue_id' => $request->queue_id,
            'cust_name' => $request->cust_name,
            'date' => $request->date,
            'reg_address' => $request->reg_address,
            'time_in' => $request->time_in,
            'engine_no' => $request->engine_no,
            'contact_no' => $request->contact_no,
            'km_reading' => $request->km_reading,
            'model' => $request->model,
            'transmission' => $request->transmission,
            'color' => $request->color,
            'svc_request' => $request->svc_request,
            'ds_full' => $request->ds_full,
            'ds_int' => $request-> ds_int,
            'ds_ext' => $request->ds_ext,
            'ds_eng' => $request->ds_eng,
            'ds_rust' => $request->ds_rust,
            'full_remarks'=> $request->full_remarks,
            'int_remarks' => $request->int_remarks,
            'ext_remarks' => $request->ext_remarks,
            'engine_remarks' => $request->engine_remarks,
            'rustproof_remarks' => $request->rustproof_remarks,
            'guard_name' => $request->guard_name,
        ]);

        $queue->save();
    }
}
