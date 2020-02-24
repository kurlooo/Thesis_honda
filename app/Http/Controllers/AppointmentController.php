<?php

namespace App\Http\Controllers;

use App\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{

    public function index()
    {
        $appoints = Appointments::all()->sortByDesc('created_at');

        return view('svcmktg.svcmktg',compact('appoints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('svcmktg.svcmktg');
    }

    public function store(Request $request)
    {
//
//        $validator = Validator::make($request->all(), [
//            'plate_no' => ['required','string','max:8','unique:appointments'],
//        ]);
//
//        if ($validator->fails()) {
//
//            return redirect()->route('appointment.index')->withErrors($validator)->withInput();
//        }

        $request->validate([
            'plate_no' => ['required','string','max:8'],
            'serviceType' => 'required',
            'datetime' => 'required',
        ]);

        $appoint = new Appointments([
            'plate_no' => $request->get('plate_no'),
            'serviceType' => $request->get('serviceType'),
            'datetime' => $request->get('datetime'),
            'remarks' => $request->get('remarks'),
        ]);

        $appoint->save();

        return redirect()->route('appointment.index')->with('success', 'Appointment added successfully!');
    }


    public function edit($apt_id)
    {
        $appoint = Appointments::find($apt_id);

        return view('svcmktg.edit', compact('appoint'));
    }

    public function update(Request $request, $apt_id)
    {
        $request->validate([
            'plate_no' => 'required',
            'serviceType' => 'required',
            'datetime' => 'required',
        ]);

        $appoint = Appointments::find($apt_id);

        $appoint-> plate_no = $request-> plate_no;
        $appoint-> serviceType = $request-> serviceType;
        $appoint-> datetime = $request-> datetime;
        $appoint-> remarks = $request-> remarks;
        $appoint->save();

        return redirect()->route('appointment.index')->with('success', 'Appointment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($apt_id)
    {
        $appoint = Appointments::find($apt_id);
        $appoint->delete();


        return redirect()->route('appointment.index')->with('success', 'Appointment deleted successfully!');
    }

    public function plate()
    {
        $last = DB::table('appointments')->select('plate_no')->get();

        return response()->json($last);
    }


}
