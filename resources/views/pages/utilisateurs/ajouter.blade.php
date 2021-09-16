@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>Ajouter un utilisateur</h4>
                </div>
                <div class="button">
                    <a href="{{route('utilisateurs.consulter')}}" class="btn btn-success">consulter les utilisateurs</a>
                </div>
            </div>
            <div class="card-body">
                @include('flash')
                <form action="{{route('utilisateurs.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form py-5">
                        <div class="form-group mb-3">
                            <label for="nom">Nom et Prénom</label>
                            <input type="text" class="form-control" name="nom_prenom" placeholder="Nom et prénom" value={{old('nom_prenom')}}>
                            @error('nom_prenom') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="statut_id">Statut</label>
                            <select name="statut_id" class="form-control">
                                <option value="">séléctionner le statut</option>
                                @foreach($statuts as $statut)
                                    <option value="{{$statut->id}}" @if((old('statut_id')) && old('statut_id') == $statut->id) {{'selected'}} @endif>{{$statut->statut}}</option>
                                @endforeach
                            </select>
                            @error('bu_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">username</label>
                            <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" value={{old('username')}}>
                            @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">email</label>
                            <input type="text" class="form-control" name="email" placeholder="email" value={{old('email')}}>
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="mot de passe" value={{old('password')}}>
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">confirmer le mot de passe</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="confirmer le mot de passe" value={{old('password_confirmation')}}>
                            @error('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">image</label>
                            <input type="file" class="form-control" name="image">
                            @error('image') <span class="text-danger">{{$message}}</span> @enderror
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
