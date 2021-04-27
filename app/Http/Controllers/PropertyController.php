<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
        $properties = Property::where('user_id', Auth::user()->id)->get();
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
        $validator = $this->validateInputs($request);

        if ($validator->fails()) {
            return redirect()->route('properties.index')->withErrors($validator->errors());
        }

        $inputData = $request->all();
        $property = new Property();
        $property->title = $inputData['title'];
        $property->user_id = auth()->user()->id;
        $property->description = $inputData['description'];
        $property->address = $inputData['address'];
        $property->city = $inputData['city'];
        $property->price = $inputData['price'];
        $property->date = $inputData['date'];
        $property->photo = $this->saveFoto($request, uniqid());
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
        $validator = $this->validateInputs($request);

        if ($validator->fails()) {
            return redirect()->route('properties.edit', $property->id)->withErrors($validator->errors());
        }

        $property->title = $request->get('title');
        $property->description = $request->get('description');
        $property->user_id = $request->get('user');
        $property->address = $request->get('address');
        $property->city = $request->get('city');
        $property->price = $request->get('price');
        $property->date = $request->get('date');
        $property->photo = $this->saveFoto($request, uniqid());
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

    private function saveFoto($request, $name)
    {
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $file = $request->file('photo');
                $extension = $file->extension();
                $file->storeAs('public', $name . "." . $extension);
                return asset("storage/" . $name . "." . $extension);
            }

        }
        return null;
    }

    private function validateInputs(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'address' => 'required',
            'city' => 'required',
            'price' => 'required|numeric',
        );

        return Validator::make($request->all(), $rules);
    }


}
