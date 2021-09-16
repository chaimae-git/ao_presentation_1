@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3 mb-3">
            <div>
                <h4 class="text-gray-dark m-0" style="font-size:20px">Modifier un AO</h4>
            </div>
            <div class="button">
                <a href="{{route('aos.consulter')}}" class="btn bg-blue-button rounded text-white">Consulter les AOs</a>
            </div>
        </div>

        <div class="panel-body px-3 bg-white border">
            <div class="row py-5">

                <div class="form col-12 p-0">
                    <div class="content-form-body bg-white p-3">
{{--                            <div class="position-relative w-75 mx-auto mb-4">--}}
{{--                                <!-- Progress bar -->--}}
{{--                                <div class="before-bar"></div>--}}
{{--                                <div class="progressbar">--}}
{{--                                    <div class="progress" id="progress"></div>--}}

{{--                                    <div class="progress-step progress-step-active" data-title="Informations Générales"></div>--}}
{{--                                    <div class="progress-step" data-title="Affectations"></div>--}}
{{--                                    <div class="progress-step" data-title="Localisation"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        <div class="content-form pt-4">
                            @include('flash')
                            <form action="{{route('aos.update', $ao)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('pages.aos.edit.section_1')
                                @include('pages.aos.edit.section_2')
                                @include('pages.aos.edit.section_3')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.rawgit.com/crlcu/multiselect/v2.5.1/dist/js/multiselect.min.js"></script>

    <script>
        const prevBtns = document.querySelectorAll(".btn-prev");
        const nextBtns = document.querySelectorAll(".btn-next");
        const progress = document.getElementById("progress");
        const formSteps = document.querySelectorAll(".form-step");
        const progressSteps = document.querySelectorAll(".progress-step");

        let formStepsNum = 0;

        nextBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum++;
                updateFormSteps();
                updateProgressbar();
            });
        });

        prevBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum--;
                updateFormSteps();
                updateProgressbar();
            });
        });

        function updateFormSteps() {
            formSteps.forEach((formStep) => {
                formStep.classList.contains("form-step-active") &&
                formStep.classList.remove("form-step-active");
            });

            formSteps[formStepsNum].classList.add("form-step-active");
        }

        function updateProgressbar() {
            progressSteps.forEach((progressStep, idx) => {
                if (idx < formStepsNum + 1) {
                    progressStep.classList.add("progress-step-active");
                } else {
                    progressStep.classList.remove("progress-step-active");
                }
            });

            const progressActive = document.querySelectorAll(".progress-step-active");

            progress.style.width =
                ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
        }


        $('#multiselect_administratif').multiselect('');
        $('#multiselect_finance').multiselect();
        $('#multiselect_tech').multiselect();
    </script>
@endsection
