<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class inicioController extends Controller
{
    public function index()
    {        
        return view('layouts.mainInicio');
    }
}