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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.utilisateurs.consulter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuts = Statut::orderBy('statut')->get();
        return view('pages.utilisateurs.ajouter', compact('statuts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UtilisateurRequest $request)
    {
        try{
            $utilisateur = new Utilisateur();
            $utilisateur->statut_id = $request->statut_id;
            $utilisateur->nom_prenom = $request->nom_prenom;
            $utilisateur->username = $request->username;
            $utilisateur->password = Hash::make($request->password);
            $utilisateur->email =$request->email;

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $request->file('image')->extension();
                    $img_name = $utilisateur->username.Carbon::now()->format('YmdHs').'.'.$extension;
                    $user_folder_path = 'images/utilisateurs/'.$utilisateur->username;
                    mkdir($user_folder_path);
                    $imagePath = $user_folder_path.'/'.$img_name;
                    Image::make($image_tmp)->resize(300, 200)->save($imagePath);
                    $utilisateur->image = $img_name;
                }
            }

            if($utilisateur->save()){
                return redirect()->route('utilisateurs.consulter')->with('success', 'utilisateur Ajouté avec succes');
            }else{
                throw new Exception('il y a une erreur de saisie');
            }
        }catch(Exception $e){
            return redirect()->back()->with('erreur', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Utilisateur $utilisateur)
    {
        return view('pages.utilisateurs.afficher');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilisateur $utilisateur)
    {
        $statuts = Statut::orderBy('statut')->get();
        return view('pages.utilisateurs.editer', compact('utilisateur', 'statuts'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(UtilisateurRequest $request, Utilisateur $utilisateur)
    {
        try{
            $utilisateur->statut_id = $request->statut_id;
            $utilisateur->nom_prenom = $request->nom_prenom;
            $utilisateur->username = $request->username;
            $utilisateur->password = Hash::make($request->password);
            $utilisateur->email =$request->email;
            //$utilisateur->image = $utilisateur->image;

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $request->file('image')->extension();
                    $img_name = $utilisateur->username.Carbon::now()->format('YmdHs').'.'.$extension;
                    $user_folder_path = 'images/utilisateurs/'.$utilisateur->username;
                    if(!is_dir($user_folder_path))mkdir($user_folder_path);
                    $imagePath = $user_folder_path.'/'.$img_name;
                    Image::make($image_tmp)->resize(300, 200)->save($imagePath);
                    $utilisateur->image = $img_name;
                }

            }

            if($utilisateur->update()){
                return redirect()->route('utilisateurs.consulter')->with('success', 'utilisateur modifié avec succes');
            }else{
                throw new Exception('il y a une erreur de saisie');
            }
        }catch(Exception $e){
            return redirect()->back()->with('erreur', 'érreur : '. $e->getMessage());
        }
    }

    public function edit_password(Utilisateur $utilisateur){
        return view('pages.utilisateurs.editer_password', compact('utilisateur'));
    }

    public function update_password(Request $request, Utilisateur $utilisateur)
    {


        try{
            if(Hash::check($utilisateur->password, $request->old_password)){
                $utilisateur->password = Hash::make($request->password);

                if($utilisateur->update()){
                    return redirect()->route('utilisateurs.consulter')->with('success', 'met de passe modifié avec succes');
                }else{
                    throw new Exception('il y a une erreur de modification');
                }
            }else{
                throw new Exception('le mot de passe que vous saisissez est incorrecte');
            }


        }catch(Exception $e){
            return redirect()->back()->with('erreur', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $utilisateur)
    {
        try{
            if($utilisateur->delete()){
                return redirect()->route('utilisateurs.consulter')->with('success', 'utilisateur supprimé avec succée');
            }else{
                throw new Exception('il y a un érreur de supprission');
            }

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['erreur : '=>$e->getMessage()]);
        }
    }
}
