<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
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
        $property->description = $inputData['description'];
        $property->address = $inputData['address'];
        $property->city = $inputData['city'];
        $property->price = $inputData['price'];
        $property->date = $inputData['date'];
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
        return view('properties.edit', ["property" => $property]);
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
        Property::destroy($property->id);
        return redirect()->route('properties.index')->with('message', 'Property deleted!');

    }
}
