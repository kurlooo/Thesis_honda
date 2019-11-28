<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointments;

class AppointmentController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index() {

        $appoints = Appointments::all();

        return view('pages.svcmktg');
    }


    public function app(Request $request) {

        $appoint = new Appointments();
        $appoint-> plate_no = $request->plate_no;
        $appoint-> serviceType = $request->serviceType;
        $appoint-> datetime = $request->datetime;
        $appoint-> remarks = $request->remarks;
        $appoint->save();

        return redirect()->route('hello')->with('success', 'Appointment added successfully!');
    }
}
