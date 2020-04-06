<?php

namespace App\Http\Controllers;

use App\JobCtrlSheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobCtrlController extends Controller
{

    public function index()
    {
//        $jobs = JobCtrlSheet::all()->sortBy('created_at');
        $jobs = JobCtrlSheet::whereDate('created_at', Carbon::today())->get();
        return view('jobctrl.index',compact('jobs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'RO_no' => ['required','unique:jobctrl'],
            'workbay_id' => 'required',
            'tech_name' =>'required',
            'cust_name' => 'required',
            'plate_no' => ['required','string','max:8'],
            'model' => 'required',
//            'frt' => 'required',
            'hour' => 'required',
            'min' => 'required',
        ]);

        $job = new JobCtrlSheet([
            'RO_no' => $request->RO_no,
            'workbay_id' => $request->workbay_id,
            'tech_name' => $request->tech_name,
            'cust_name' => $request->cust_name,
            'plate_no' => $request->plate_no,
            'model' => $request->model,
//            'frt' => $request->frt,
            'hour' => $request->hour,
            'min' => $request->min,
        ]);

        $job->save();

        return redirect()->route('jobctrl.index')->with('success', 'Job Added Successfully!');
    }

    public function edit($RO_no)
    {
        $jab = JobCtrlSheet::find($RO_no);

        return view('jobctrl.edit', compact('jab'));
    }

    public function update(Request $request, $RO_no)
    {
        $request->validate([
            'frt' => 'required',
        ]);

        $jab = JobCtrlSheet::find($RO_no);

        $plate = $jab->plate_no;
        $rono = $jab->RO_no;
//        $jab-> frt = $request-> frt;
        $jab-> hour = $request->hour;
        $jab-> min = $request->min;
        $jab->save();

        $msg = "$plate FRT updated successfully!";

//        $hat = $this->updit($rono);
//
//        JobCtrlSheet::where('RO_no',$rono)
//            ->update(['frt2'=>$hat]);

        return redirect()->route('jobctrl.index')->with('success', $msg);
    }

    public function checkout($R0_no)
    {
        $check = JobCtrlSheet::find($R0_no);

        $plate = $check->plate_no;
        $msg = "$plate Checkout Success!";
        $error = "$plate cannot be checked out.";


        if(is_null($check->time_in1) or is_null($check->time_out1)){
            return redirect()->route('jobctrl.index')->with('error',$error);
        }
        else {
            $who = $check->RO_no;
            JobCtrlSheet::where('RO_no', $who)
                ->update(['rlsd' => Carbon::now()->toTimeString()]);

            return redirect()->route('jobctrl.index')->with('success',$msg);
        }

    }

    public function comp($plate_no)
    {
        if (empty($plate_no)) {
            return [];
        }

        $job = DB::table('checklisting')
//            ->join('queuing','checklist.plate_no', '=','queuing.plate_no')
            ->select('plate_no','cust_name','model')
            ->where('plate_no','LIKE',"$plate_no%")
            ->get();

        return response()->json($job);

    }

    public function comptek(Request $request)
    {
        $search = $request->get('term');

        $result = DB::table('technicians')
            ->where('name', 'LIKE', '%'. $search. '%')->get();

        return response()->json($result);

    }

    function updit($RO_no){
        $lol = JobCtrlSheet::find($RO_no);

        $min = Carbon::parse($lol->time_in1);
        $max = Carbon::parse($lol->frt);

        return $max->diff($min)->format('%H:%i:%s');
    }
}
