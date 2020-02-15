<?php

namespace App\Http\Controllers;

use App\JobCtrlSheet;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    public function index2()
    {
        return view('dashboard');
    }

    public function bckup()
    {

        $process = new Process(['/bin/bash','/home/bendelorm/backup_honda/backup2.sh']);
        $process->run();

// executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

//        echo $process->getOutput();
        return redirect()->route('homee')->with('status','Database Backup Successful!');

    }
}
