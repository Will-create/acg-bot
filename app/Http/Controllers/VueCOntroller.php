<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueCOntroller extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
