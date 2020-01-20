<?php

namespace App\Http\Controllers;

use App\JobCtrlSheet;
use Illuminate\Support\Facades\DB;

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
        $count = JobCtrlSheet::select(DB::raw("count(workbay_id) as tcount, workbay_id"))
            ->groupBy('workbay_id')
            ->get()->toArray();

        $count = [];

        foreach ($count as $row){
            $count['label'][] = $row->workbay_id;
            $count['data'][] = $row->tcount;
        }

        $count['workbay_data'] = json_encode($count);
        return view('dashboard',$count);
    }
}
