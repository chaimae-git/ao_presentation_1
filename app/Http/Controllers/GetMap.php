<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetMap extends Controller
{
    public function index(){
        //$sql = "SELECT *, ST_AsGeoJSON(geometry) AS geojson FROM locations";
        $geo = DB::table('locations')->where('ao_id', 2)->select('adresse', DB::raw("ST_AsGeoJSON(location) AS geojson"))->get();
        //dd($geo);
        return view('pages.getmap', compact('geo'));
    }
}
