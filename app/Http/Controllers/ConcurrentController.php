<?php

namespace App\Http\Controllers;

use App\Models\Concurrent;
use Illuminate\Http\Request;

class ConcurrentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.concurrents.consulter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.concurrents.consulter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Concurrent  $concurrent
     * @return \Illuminate\Http\Response
     */
    public function show(Concurrent $concurrent)
    {
        return view('pages.concurrents.afficher');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Concurrent  $concurrent
     * @return \Illuminate\Http\Response
     */
    public function edit(Concurrent $concurrent)
    {
        return view('pages.concurrents.editer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Concurrent  $concurrent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concurrent $concurrent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concurrent  $concurrent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concurrent $concurrent)
    {
        //
    }
}
