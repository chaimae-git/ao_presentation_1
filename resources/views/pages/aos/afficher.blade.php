@extends('layouts.master')

@section('title')
    <h1 class="m-0">AOs</h1>
@endsection

@section('page')
    <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
    <li class="breadcrumb-item active">Détails AO</li>
@endsection
@section('content')
    <div class="card card-default informations_generals mb-3">
        <div class="card-header">
            <h4>Informations Générales</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-9 py-2">
                    <div class="row mb-3">
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">N° AO : </span>{{$ao->num_AO}}</p>
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">Pays : </span>{{$ao->pays->pays}}</p>
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">Date Limite : </span>{{$ao->date_limite}}</p>
                    </div>

                    <div class="row mb-3">
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">Adjudication : </span>{{$ao->adjudication->adjudication}}</p>
                        <p class="col-8 text-black-50 my-0"><span class="title text-dark text-bold">Critère de Sélection : </span>{{$ao->critere->critere}}</p>
                    </div>

                    <div class="row mb-3">
                        <p class="col-12 text-black-50 my-0"><span class="title text-dark text-bold">Ministere De Tutelle: </span>{{$ao->ministere_de_tutelle->ministere}}</p>
                    </div>

                    <div class="row mb-3">
                        <p class="col-12 text-black-50 my-0"><span class="title text-dark text-bold">Secteur d'activité : </span>{{$ao->secteur_activite->secteur}}</p>
                    </div>

                    <div class="row mb-3">
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">Type : </span>{{$ao->type->type}}</p>
                    </div>

                    <div class="row mb-3">
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">Client : </span>{{$ao->client->client}}</p>
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">Chef de Fil : </span>{{$ao->chef_de_fil->partenariat}}</p>
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">N° Lot : </span>{{$ao->n_lot}}</p>
                    </div>

                    <div class="row mb-3">
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">Budget : </span>{{$ao->budget}} DH</p>
                        <p class="col-4 text-black-50 my-0"><span class="title text-dark text-bold">Montant de Soumission : </span>{{$ao->montant_soumission}} DH</p>
                    </div>

                    <div class="row mb-3">
                        <p class="col-12 text-black-50 my-0"><span class="title text-dark text-bold">Montant Caution Provisoire : </span>{{$ao->montant_c_p}} DH</p>
                    </div>

                    <div class="row mb-3">
                        <p class="col-12 text-black-50 my-0"><span class="title text-dark text-bold">Date de Depot : </span>{{$ao->date_de_depot}}</p>
                    </div>

                    <div class="row mb-3">
                        <p class="col-12 text-black-50 my-0 mb-1">
                            <span class="title text-dark text-bold">Objet</span>
                        </p>
                        <div class="border p-2 m-2" style="min-height:60px; width:98%">
                            {{$ao->objet}}
                        </div>

                    </div>
                    <div class="row">
                        <a href="{{route('aos.download_file')}}?file={{$ao->CPS}}" class="col-4 text-black-50">
                            <span class="mr-2"><i class="fas fa-file fa-2x"></i></span>CPS
                        </a>
                        <a href="{{route('aos.download_file')}}?file={{$ao->RC}}" class="col-4 text-black-50">
                            <span class="mr-2"><i class="fas fa-file fa-2x"></i></span>RC
                        </a>
                        <a href="{{route('aos.download_file')}}?{{$ao->AVIS}}" class="col-4 text-black-50">
                            <span class="mr-2"><i class="fas fa-file fa-2x"></i></span>AVIS
                        </a>
                    </div>



                </div>
                <div class="col-3 py-2 niceScroll" style="height:500px">
                    <div class="card card-default mb-4">
                        <div class="card-header text-bold">Secretaires</div>
                        <div class="card-body p-0">
                            <ul class="list-group">
                                @foreach($ao->utilisateurs as $secretaire)
                                    <li class="list-group-item border-left-0 border-right-0 border-top-0 pr-0 text-black-50">{{$secretaire->nom_prenom}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card card-default mb-4">
                        <div class="card-header text-bold">Bus</div>
                        <div class="card-body p-0">
                            <ul class="list-group">
                                @foreach($ao->bus as $bu)
                                    <li class="list-group-item border-left-0 border-right-0 border-top-0 text-black-50">{{$bu->nom}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card card-default mb-4">
                        <div class="card-header text-bold">départements</div>
                        <div class="card-body p-0">
                            <ul class="list-group">
                                @foreach($ao->departements as $departement)
                                    <li class="list-group-item border-left-0 border-right-0 border-top-0 text-black-50">{{$departement->nom}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card card-default mb-4">
                        <div class="card-header text-bold">Partenariats</div>
                        <div class="card-body p-0">
                            <ul class="list-group">
                                @foreach($ao->partenariats as $partenariat)
                                    @if($partenariat->id == $ao->chef_de_fil->id)
                                        <li class="list-group-item border-left-0 border-right-0 border-top-0 text-success" style="background-color: rgba(35, 203, 167, 0.3)"><i class="fas fa-user-check mr-2"></i>{{$partenariat->partenariat}}</li>
                                    @endif
                                    <li class="list-group-item border-left-0 border-right-0 border-top-0 text-black-50">{{$partenariat->partenariat}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default localisation mb-3">
        <div class="card-header">
            <h4>Localisation</h4>
        </div>
        <div class="card-body">
            <div class="mymap" id="mymap"></div>
        </div>
    </div>

    <div class="card card-default localisation mb-3">
        <div class="card-header">
            <h4>Documents Administratif</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <livewire:piece-a-preparer-administratif :partie="$partie_administratif" :ao="$ao->id"/>
                </div>
                <div class="col-8">
                    <livewire:document-administratif :partie="$partie_administratif" :ao="$ao->id"/>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default localisation mb-3">
        <div class="card-header">
            <h4>Documents Financières</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <livewire:piece-a-preparer-financiere :partie="$partie_financiaire" :ao="$ao->id"/>
                </div>
                <div class="col-8">
                    <livewire:document-financiere :partie="$partie_financiaire" :ao="$ao->id"/>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default localisation mb-3">
        <div class="card-header">
            <h4>Documents Techniques</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <livewire:piece-a-preparer-technique :partie="$partie_technique" :ao="$ao->id"/>
                </div>
                <div class="col-8">
                    <livewire:document-technique :partie="$partie_technique" :ao="$ao->id"/>
                </div>
            </div>
        </div>
    </div>
@endsection


