@extends('homepage.layout.homepage')

@section('content')
    <div class="container-fluid mt-5 pt-5">
        <div class="row d-flex flex-lg-row align-content-center justify-content-center">
            <div class="mx-3 my-2 avito_homepage-component-tile avito_homepage-component-tile__animation" onclick="location.href='/users';">
                <div class="avito_homepage-component-tile__inner tile__inner--animation px-auto text-center">
                    <i class="fa-solid fa-users fa-2x"></i>
                    <h2 class="pt-2">{{ __("object-names.user.employees") }}</h2>
                </div>
            </div>
            <div class="mx-3 my-2 avito_homepage-component-tile avito_homepage-component-tile__animation" onclick="location.href='/projects';">
                <div class="avito_homepage-component-tile__inner tile__inner--animation px-auto text-center">
                    <i class="fa-solid fa-code fa-2x"></i>
                    <h2 class="pt-2">{{ __("object-names.project.projects") }}</h2>
                </div>
            </div>
            <div class="mx-3 my-2 avito_homepage-component-tile avito_homepage-component-tile__animation" onclick="location.href='/tasks';">
                <div class="avito_homepage-component-tile__inner tile__inner--animation px-auto text-center">
                    <i class="fa-solid fa-bars-staggered fa-2x"></i>
                    <h2 class="pt-2">{{ __("object-names.task.tasks") }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
