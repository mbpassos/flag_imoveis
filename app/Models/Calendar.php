<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Calendar extends Model
{
    use HasFactory;

    private $_id;
    private $date;
    private $time;


    public function __construct($array)
    {
        $this->_id = $array['_id'] ?? 0;
        $this->date = $array['date'];
        $this->time = $array['time'];
    }

    public function getId() : string
    {
        return $this -> _id;
    }

    public function getDate() : string
    {
        return $this -> date;
    }

    public function getTime(): string
    {
        return $this-> time;
    }

    public function attributesToArray(){
        return [
            "_id" => $this->_id,
            "date" => $this->date,
            "time" => $this->time
        ];
    }
}



