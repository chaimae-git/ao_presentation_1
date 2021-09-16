<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiselectController extends Controller
{
    public function store(Request $request){
        //print_r($request->input('from'));
        $request->validate([
            'items_id'=>'required',
        ]);

        print_r($request->input('items_id'));
        die();
    }
}
