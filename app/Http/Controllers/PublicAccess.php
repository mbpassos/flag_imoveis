<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PublicAccess extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('publicacess.index', ['properties' => $properties]);
    }
}
