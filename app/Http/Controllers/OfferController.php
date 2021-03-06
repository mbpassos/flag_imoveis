<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;


class OfferController extends Controller
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
            return view('offers.index', ['offers' => Offer::all()]);
        } else return redirect('/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if (Gate::allows('clientRole')){
        //    return view('offers.create', ['offers' => Offer::all(), 'users' => User::all(), 'properties' => Property::all()]);
        //} else return redirect('/offers')->with('message', 'Acess denied!');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Offer $offer)
    {
        $validator = $this->validateInputs($request);

        if ($validator->fails()) {
            return redirect()->route('offers.edit', $offer->id)->withErrors($validator->errors());
        }

        $inputData = $request->all();

        $offer->property_id = $inputData['property_id'];
        $offer->user_id = $inputData['user_id'];
        $offer->price = $inputData['price'];
        $offer->save();
        return redirect('/')->with('message', 'New offer made!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
       return view('offers.view', ["offer" => $offer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        if (Gate::allows('clientRole')){
            return view('offers.edit', ["offer" => $offer, 'users' => User::all(), 'properties' => Property::all()]);
        } else return redirect('/offers')->with('message', 'Acess denied!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $validator = $this->validateInputs($request);

        if ($validator->fails()) {
            return redirect()->route('offers.edit', $offer->id)->withErrors($validator->errors());
        }

        $offer->property_id = $request->get('property');
        $offer->user_id = auth()->user()->id;
        $offer->price = $request->get('price');
        $offer->save();
        return redirect()->route('offers.index')->with('message', 'Offer updated successfuly!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        if (Gate::allows('agentRole')){
            Offer::destroy($offer->id);
            return redirect()->route('offers.index')->with('message', 'Offer deleted!');
        } else return redirect('/offers')->with('message', 'Acess denied!');

    }

    private function validateInputs(Request $request)
    {
        $rules = array(

            'price' => 'required|numeric'
        );

        return Validator::make($request->all(), $rules);
    }





}
