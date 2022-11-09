<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function comprar(Request $request)
    {   
        
        $data = json_decode($request->data); 
        $tipo = $request->select; 



        return view('prueba',compact('data','tipo'));
    }
}
