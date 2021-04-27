<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Service\CalendarService;

class CalendarController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new CalendarService();
    }

    public function index()
    {
        //$this->service->testeApi();
        //dd('olá');
        //return view('appointments.index', ["calendar" => $this->service->getCalendar()]);
    }
}
