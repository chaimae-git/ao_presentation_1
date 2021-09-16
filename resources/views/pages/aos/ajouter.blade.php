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
                <div class="content-form-body bg-white mx-3 p-3">
{{--                        <div class="position-relative w-75 mx-auto mb-4">--}}
{{--                            <!-- Progress bar -->--}}
{{--                            <div class="before-bar"></div>--}}
{{--                            <div class="progressbar">--}}
{{--                                <div class="progress" id="progress"></div>--}}

{{--                                <div class="progress-step progress-step-active" data-title="Informations Générales"></div>--}}
{{--                                <div class="progress-step" data-title="Affectations"></div>--}}
{{--                                <div class="progress-step" data-title="Localisation"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="content-form pt-4">
                            @include('flash')
                            <form action="{{route('aos.store')}}" method="post" enctype="multipart/form-data" class="">
                                @csrf
                                @include('pages.aos.add.section_1')
                                @include('pages.aos.add.section_2')
                                @include('pages.aos.add.section_3')
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

