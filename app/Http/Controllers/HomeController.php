<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\cabanas;


class HomeController extends Controller
{
    public function index()
    {
        $cabanas = cabanas::where('publicar', '=', '1')->paginate(5);

        $cabanas->each(function($cabanas){
        	$cabanas->imagen;
        });

        return view('home')
            ->with('cabanas', $cabanas);
    }

}
