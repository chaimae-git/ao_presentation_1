@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>Modifier le mot de passe</h4>
                </div>
                <div class="button">
                    <a href="{{route('utilisateurs.consulter')}}" class="btn btn-success">consulter les utilisateurs</a>
                </div>
            </div>
            <div class="card-body">
                @include('flash')
                <form action="{{route('utilisateurs.update', $utilisateur)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form py-5">

                        <div class="form-group mb-3">
                            <label for="username">mot de passe</label>
                            <input type="password" class="form-control" name="old_password" placeholder="mot de passe">
                            @error('old_password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">nouveau mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="mot de passe">
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">confirmer le mot de passe</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="confirmer le mot de passe">
                            @error('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
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
