<?php


namespace App\Classes;


use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Location
{
    public $adresse;
    public $location;

    public $listLocations;

    public function __construct($strigofadresse, $stringofgeom){
        //$this->type = $stringoftype;
        $this->adresse = $strigofadresse;
        $this->location = $stringofgeom;
    }

    public function buildQuery(){
        return DB::raw("public.ST_SetSRID(public.ST_GeomFromGeoJSON('$this->location'), 27700)");
    }

    public function storeLocation(Request $request){
        $location = (new Location($request->adresseofgeom, $request->stringofgeom));
        Session::push('location_o_l', $location);
    }

    public function setLocations(){
        if(Session::has('location_o_l')){
            $this->listLocations = Session::pull('location_o_l');
        }
    }

    public function clearSessionLocation(){
        if(Session::has('location_o_l')){
            Session::forget('location_o_l');
        }
    }

    public function getLocations(){
        if($this->listLocations != null){
            $this->clearSessionLocation();
            return $this->listLocations;
        }
    }

    public function reset(){
        $this->clearSessionLocation();
        $this->listLocations = null;
    }

}
