<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Province;
use App\Town;


class otherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function countries()
    {
        
        return response (Country::pluck('countryname'), 200);
    }
    public function provinces()
    {
        
        return response (Province::get(), 200);
    }
    public function towns($id)
    {
       
        return response (Town::where('provinceid', $id)->pluck('townname'), 200);
    }
}
