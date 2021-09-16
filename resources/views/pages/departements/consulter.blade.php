@extends('layouts.master')

@section('title')
    <h1 class="m-0">Données</h1>
@endsection

@section('page')
    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
    <li class="breadcrumb-item active">Listes des Données</li>
@endsection
@section('content')
    <div class="panel panel-default">
        <livewire:departements/>
    </div>
@endsection

@section('scriptsSection')

@endsection
