<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtilisateurRequest;
use App\Models\Statut;
use App\Models\Utilisateur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use Intervention\Image\Facades\Image;

class UtilisateurController extends Controller
{

    public function index()
    {
        return view('pages.utilisateurs.consulter');
    }


    public function show(Utilisateur $utilisateur)
    {
        return view('pages.utilisateurs.afficher');
    }

}
