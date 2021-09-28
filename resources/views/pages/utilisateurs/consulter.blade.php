@extends('layouts.master')
@section('title')
    <h1 class="m-0">Utilisateurs</h1>
@endsection

@section('page')
    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
    <li class="breadcrumb-item active">Listes des Utilisateurs</li>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <livewire:utilisateurs/>
        </div>
    </div>
@endsection
