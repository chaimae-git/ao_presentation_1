@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>Ajouter un BU</h4>
                </div>
                <div class="button">
                    <a href="{{route('bus.consulter')}}" class="btn btn-success">consulter les BUs</a>
                </div>
            </div>
            <div class="card-body">
                @include('flash')
                <form action="{{route('bus.store')}}" method="post">
                    @csrf
                    <div class="form py-5">
                        <div class="form-group mb-3">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" placeholder="Nom" value={{old('nom')}}>
                            @error('nom') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom">Description</label>
                            <textarea name="description" cols="10" class="form-control" placeholder="description">{{old('description')}}</textarea>
                            @error('description') <span class="text-danger">{{$message}}</span> @enderror
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

