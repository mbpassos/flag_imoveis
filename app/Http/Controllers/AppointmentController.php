<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\Gate;

class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!(Gate::allows('clientRole'))){
            return view('appointments.index', ['appointments' => Appointment::all()]);
        } else return redirect('/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('clientRole')) {
            return view('appointments.create', ['appointments' => Appointment::all(), 'users' => User::all(), 'properties' => Property::all()]);
        } else return redirect('/appointments')->with('message', 'Acess denied!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputData = $request->all();
        $appointment = new Appointment();
        $appointment->property_id = $inputData['property'];
        $appointment->user_id = $inputData['user'];
        $appointment->information = $inputData['information'];
        $appointment->save();
        return redirect('/')->with('message', 'New appointment made!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.view', ["appointment" => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        if (Gate::allows('agentRole')){
            return view('appointments.edit', ["appointment" => $appointment, 'users' => User::all(), 'properties' => Property::all()]);
        } else return redirect('/appointments')->with('message', 'Acess denied!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $inputData = $request->all();
        $appointment->property_id = $inputData['property'];
        $appointment->user_id = $inputData['user'];
        $appointment->information = $inputData['information'];
        $appointment->save();
        return redirect()->route('appointments.index')->with('message', 'Appointment updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        if (Gate::allows('agentRole')){
            Appointment::destroy($appointment->id);
            return redirect()->route('appointments.index')->with('message', 'Appointment deleted!');
        } else return redirect('/appointments')->with('message', 'Acess denied!');

    }
}
