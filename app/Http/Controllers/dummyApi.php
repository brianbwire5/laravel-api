<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyApi extends Controller
{
    function getData()
    {
        return ["name"=>"Brian","email"=>"brianbwire@gmail.com", "address"=>"nairobi"];
    }
}
