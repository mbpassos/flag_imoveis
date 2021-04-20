<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;


class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$properties = Property::all();
        //$users = User::all();
        return view('offers.index', ['offers' => Offer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create',['offers' => Offer::all(), 'users' => User::all(), 'properties' => Property::all()]);

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
        $offer = new Offer();
        $offer->property_id = $inputData['property'];
        $offer->user_id = $inputData['user'];
        $offer->price = $inputData['price'];
        $offer->save();
        return redirect()->route('offers.index')->with('message', 'New offer made!');
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
        return view('offers.edit', ["offer" => $offer, 'users' => User::all(), 'properties' => Property::all()]);
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
        $inputData = $request->all();
        $offer->property_id = $inputData['property'];
        $offer->user_id = $inputData['user'];
        $offer->price = $inputData['price'];
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
        Offer::destroy($offer->id);
        return redirect()->route('offers.index')->with('message', 'Offer deleted!');
    }
}
