<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PropertyController extends Controller
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
        if (!(Gate::allows('clientRole'))) {
        $properties = Property::all();
        return view('properties.index', ['properties' => $properties]);
        } else return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('agentRole')){
            return view('properties.create', ['users' => User::all()]);
        } else return redirect('/properties')->with('message', 'Acess denied!');

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
        $property = new Property();
        $property->title = $inputData['title'];
        $property->user_id = $inputData['user'];
        $property->description = $inputData['description'];
        $property->address = $inputData['address'];
        $property->city = $inputData['city'];
        $property->price = $inputData['price'];
        $property->date = $inputData['date'];
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->extension();
            $filename = time() . '.' . $extension;
            $file->storeAs('public', $filename);
            $property->photo = $filename;
        } else {
            return $request;
            $property->photo = '';
        };
        $property->save();
        return redirect()->route('properties.index')->with('message', 'New property added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('properties.view', ["property" => $property]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        if (Gate::allows('agentRole')){
            return view('properties.edit', ["property" => $property, 'users' => User::all()]);
        } else return redirect('/properties')->with('message', 'Acess denied!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $inputData = $request->all();
        $property->title = $inputData['title'];
        $property->description = $inputData['description'];
        $property->user_id = $inputData['user'];
        $property->address = $inputData['address'];
        $property->city = $inputData['city'];
        $property->price = $inputData['price'];
        $property->date = $inputData['date'];
        $property->save();
        return redirect()->route('properties.index')->with('message', 'Property updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        if (Gate::allows('agentRole')){
            Property::destroy($property->id);
            return redirect()->route('properties.index')->with('message', 'Property deleted!');
        } else return redirect('/properties')->with('message', 'Acess denied!');

    }











}
