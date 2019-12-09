<?php

namespace App\Http\Controllers;

use App\Appointments;
use Illuminate\Http\Request;

class ListAppController extends Controller
{
    public function index()
    {
        $appoints = Appointments::all();

        return view('listapp',compact('appoints'));
    }
}
