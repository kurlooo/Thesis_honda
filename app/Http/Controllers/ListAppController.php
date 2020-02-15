<?php

namespace App\Http\Controllers;

use App\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListAppController extends Controller
{
    public function plate()
    {
        $last = DB::table('appointments')->select('plate_no')->get();

        return response()->json($last);
    }

    public function dates()
    {
        $last = DB::table('appointments')->select('datetime')->get();

        return response()->json($last);
    }
}
