<?php

namespace App\Services;

use \App\Models\Calendar;
use Illuminate\Support\Facades\Http;

class CalendarService
{

    private $api_endpoint = "http://127.0.0.1:8001/api/agendamentos/";
    private $api_token = "14365804cf744b81846af954f0d29734";


    public function getCalendar()
    {
        $calendars = [];
        $response = Http::withToken($this->api_token)->get($this->api_endpoint);

        if ($response->successful()) {
            $response_array = json_decode($response, true);
            foreach ($response_array as $array_calendar) {
                array_push($calendars, new Calendar($array_calendar));
            }
        }
        return $calendars;
    }

    public function getById(int $id)
    {
        $response = Http::withToken($this->api_token)->get($this->api_endpoint . $id);

        if ($response->successful()) {
            $response_array = json_decode($response, true);
            return new Calendar($response_array);
        }

        return null;
    }

    public function save(Calendar $calendar)
    {
        $response = Http::withToken($this->api_token)->post($this->api_endpoint . $calendar->id, $calendar->attributesToArray());
        return $response->successful();
    }

    public function update(Calendar $calendar)
    {
        $response = Http::withToken($this->api_token)->put($this->api_endpoint . $calendar->id, $calendar->attributesToArray());
        return $response->successful();
    }

    public function delete(int $id)
    {
        $response = Http::withToken($this->api_token)->delete($this->api_endpoint . $id);
        return $response->successful();
    }
}
