<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index', ['appointments' => Appointment::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create', ['appointments' => Appointment::all(), 'users' => User::all(), 'properties' => Property::all()]);
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
        return redirect()->route('appointments.index')->with('message', 'New appointment made!');
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
        return view('appointments.edit', ["appointment" => $appointment, 'users' => User::all(), 'properties' => Property::all()]);
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
        Appointment::destroy($appointment->id);
        return redirect()->route('appointments.index')->with('message', 'Appointment deleted!');
    }
}
