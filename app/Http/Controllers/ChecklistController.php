<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function export(Request $request)
    {
        $data = $request->all();

//        return $data;

// try url/route?plate_no=wyyww& serviceType=something
        $check = new Checklist([
            'workbay_1' => $request->workbay_1,
            'workbay_2' => $request->workbay_2,
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
            'clister_com' => $request->clister_con,
        ]);

        $check->save();
    }
}
