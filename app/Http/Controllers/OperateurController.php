<?php

namespace App\Http\Controllers;

use App\Models\Operateur;
use App\Models\Restriction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OperateurController extends Controller
{

    public function index()
    {
        $operateurs=operateurs();
        
        return response()->json($operateurs);
    }
    public function operateurs()
    {
        $operateurs=operateurs();
        return response()->json($operateurs);
    }
    
  
  
    
}
    