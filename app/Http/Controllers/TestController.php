<?php

namespace App\Http\Controllers;


use App\Checklist;
use App\JobCtrlSheet;
use App\Queuing;
use App\Testing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Workbay1Controller;


class TestController extends Controller
{

    public function getDif()
    {
        $new2 = JobCtrlSheet::where('workbay_id','1')
            ->whereNull('rlsd')
            ->whereNotNull('time_in1')
            ->whereNotNull('time_out1')
            ->first();

        $start = Carbon::parse($new2->time_in1);
        $finish = Carbon::parse($new2->time_out1);


        $dur = $finish->diff($start)->format('%H:%i:%s');

        return $dur;
    }

    public function getdif2(){
        $new2 = JobCtrlSheet::where('workbay_id','1')
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

    public function test(Request $request){
//
//        if($request->ajax()) {
//            // select country name from database
//            $data = Checklist::where('plate_no', 'LIKE', $request->plate_no.'%')
//                ->get();
//            // declare an empty array for output
//            $output = '';
//            // if searched countries count is larager than zero
//            if (count($data)>0) {
//                // concatenate output to the array
//                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 99999">';
//                // loop through the result array
//                foreach ($data as $row){
//                    // concatenate output to the array
//                    $output .= '<li class="list-group-item">'.$row->plate_no.'</li>';
//                }
//                // end of output
//                $output .= '</ul>';
//            }
//            else {
//                // if there's no matching results according to the input
//                $output .= '<li class="list-group-item">'.'No results'.'</li>';
//            }
//            // return output result array
//            return $output;
//        }

        $search = $request->get('term');

        $result = DB::table('technicians')
            ->where('name', 'LIKE', '%'. $search. '%')->get();

        return response()->json($result);

    }
}
