<?php

namespace App\Http\Controllers;


use App\JobCtrlSheet;
use App\Testing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobCtrlController extends Controller
{

    public function index()
    {
        $jobs = JobCtrlSheet::all();
        return view('jobctrl.index',compact('jobs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'RO_no' => ['required','unique:jobctrl'],
            'workbay_id' => 'required',
            'tech_name' =>'required',
            'cust_name' => 'required',
            'plate_no' => ['required','string','max:8','unique:jobctrl'],
            'model' => 'required',
            'pro_time' => 'required',
        ]);

        $job = new JobCtrlSheet([
            'RO_no' => $request->RO_no,
            'workbay_id' => $request->workbay_id,
            'tech_name' => $request->tech_name,
            'cust_name' => $request->cust_name,
            'plate_no' => $request->plate_no,
            'model' => $request->model,
            'pro_time' => $request->pro_time,
        ]);

        $job->save();

        return redirect()->route('jobctrl.index')->with('success', 'Job Added Successfully!');
    }

    public function checkout($id)
    {
        $check = JobCtrlSheet::find($id);

        $who = $check->id;
        JobCtrlSheet::where('id', $who)
            ->update(['rlsd' => Carbon::now()->toTimeString()]);

        $plate = $check->plate_no;
        $msg = "$plate Checkout Success!";

        return redirect()->route('jobctrl.index')->with('success',$msg);

    }
}
