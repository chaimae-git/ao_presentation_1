@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>Modifier un utilisateur</h4>
                </div>
                <div class="button">
                    <a href="{{route('utilisateurs.consulter')}}" class="btn btn-success">consulter les utilisateurs</a>
                </div>
            </div>
            <div class="card-body">
                @include('flash')
                <form action="{{route('utilisateurs.update', $utilisateur)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form py-5">
                        <div class="form-group mb-3">
                            <label for="nom">Nom et Prénom</label>
                            <input type="text" class="form-control" name="nom_prenom" placeholder="Nom et prénom" value={{old('nom_prenom', $utilisateur->nom_prenom)}}>
                            @error('nom_prenom') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="statut_id">Statut</label>
                            <select name="statut_id" class="form-control">
                                <option value="">séléctionner le statut</option>
                                @foreach($statuts as $statut)
                                    <option value="{{$statut->id}}" @if((old('statut_id')) && old('statut_id') == $statut->id) {{'selected'}}@elseif(($utilisateur->statut_id) && $utilisateur->statut_id == $statut->id){{'selected'}} @endif>{{$statut->statut}}</option>
                                @endforeach
                            </select>
                            @error('statut_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">nom d'utilisateur</label>
                            <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" value={{old('username', $utilisateur->username)}}>
                            @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">émail</label>
                            <input type="text" class="form-control" name="email" placeholder="émail" value={{old('email', $utilisateur->email)}}>
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        @if($utilisateur->image)
                        <div class="image_edit mb-2" style="width:120px;">
                            <img class="w-100" src="{{url('images/utilisateurs/'.$utilisateur->username.'/'.$utilisateur->image)}}" alt="{{$utilisateur->username.' image'}}">
                        </div>
                        @endif
                        <div class="form-group mb-3">
                            <label for="username">image</label>
                            <input type="file" class="form-control" name="image">
                            @error('image') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="d-none">
                            <input type="hidden" name="id" value="{{$utilisateur->id}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value='ajouter'>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
