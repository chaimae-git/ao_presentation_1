@extends('layouts.master')

@section('title')
    <h1 class="m-0">AOs</h1>
@endsection

@section('page')
    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
    <li class="breadcrumb-item active">Ajouter un AO</li>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="row py-2">
            <div class="form col-12 p-0">
                <div class="content-form-body bg-white mx-3 ">

                        <div class="panel-heading border-0 d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3 bg-white">
                            <div>
                                <h4 class="text-gray-dark m-0" style="font-size:20px"></h4>
                            </div>
                            <div class="button">
                                <a href="{{route('aos.ajouter')}}" class="btn btn-outline-info">+ Ajouter un AO</a>
                            </div>
                        </div>

                        <div class="panel-body px-3 border">
                        @include('flash')

                        <table class='table bg-white''>
                            <thead>
                            <tr class="text-primary">
                                <th>N° AO</th>
                                <th>Client</th>
                                <th>Secteur d'Activité</th>
                                <th>Date Limite</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($aos as $ao)
                                <tr>
                                    <td>{{$ao->num_AO}}</td>
                                    <td>{{$ao->client->client}}</td>
                                    <td>{{$ao->secteur_activite->secteur}}</td>
                                    <td>{{$ao->date_limite}}</td>
                                    <td>
                                        <a href="{{route('aos.afficher', $ao)}}"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('aos.editer', $ao)}}"><i class="fas fa-edit"></i></a>
                                        <a href=""><i class="fas fa-trash-alt"></i></a>
                                    </td>


            {{--                            <form action="{{route('aos.destroy', $ao)}}" method ="post">--}}
            {{--                                @csrf--}}
            {{--                                @method('delete')--}}
            {{--                                <td>--}}
            {{--                                    <a class="btn btn-info" href="{{route('aos.afficher', $ao)}}">Afficher</a>--}}
            {{--                                    <a class="btn btn-warning" href="{{route('aos.editer', $ao)}}">Editer</a>--}}
            {{--                                    <input type="submit" class="btn btn-danger" value="supprimer">--}}
            {{--                                </td>--}}
            {{--                            </form>--}}

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        </div>


                </div>

            </div>
        </div>
    </div>
@endsection
