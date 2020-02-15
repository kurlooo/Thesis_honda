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
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


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

    public function test(){



        $process = new Process(['/bin/bash','/home/bendelorm/backup_honda/backup2.sh']);
        $process->run();

// executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

//        echo $process->getOutput();
//        dump(json_decode($process->getOutput(), true));
        return redirect()->route('homee')->with('status','Database Backup Successful!');


    }
}
