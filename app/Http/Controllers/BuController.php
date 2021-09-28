<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuRequest;
use App\Models\Bu;
use Exception;
use Illuminate\Http\Request;

class BuController extends Controller
{

    public function index()
    {
        return view('pages.bus.consulter');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bu  $bu
     * @return \Illuminate\Http\Response
     */
    public function show(Bu $bu)
    {
        return view('pages.bus.afficher');
    }


}
