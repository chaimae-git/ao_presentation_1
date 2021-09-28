@extends('layouts.master')

@section('title')
    <h1 class="m-0">AOs</h1>
@endsection

@section('page')
    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
    <li class="breadcrumb-item active">Editer un AO</li>
@endsection

@section('content')
    <livewire:edit-ao :ao="$ao">
@endsection
