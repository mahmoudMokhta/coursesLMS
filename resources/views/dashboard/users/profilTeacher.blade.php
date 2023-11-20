@extends('dashboard.layout.main')

@section('content')
    <div class="bg-secondary text-white d-flex justify-content-center align-items-center p-4 mb-4" style="height:400px">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center text-center text-lg-left">
            <div class="mr-lg-4 mb-4 mb-lg-0">
                <img src="{{ asset('dashboard/assets/images/256_jeremy-banks-798787-unsplash.jpg') }}" class="rounded-circle"
                    width="200" alt="Frontted">
            </div>
            <div>
                <h1 class="mb-lg-4">{{ Auth::user()->name }}</h1>
                <p class="mb-lg-4">Adrian Demian works for frontted developing Bootstrap 4 Admin Templates.</p>
                <a href="#" class="mr-3 text-white text-underline">https://www.frontted.com</a> <i
                    class="fab fa-twitter"></i>
            </div>
        </div>

    </div>

    <div class="container-fluid page__container">
        <h4 class="mb-4">{{ explode(' ', Auth::user()->name)[0] }}'s Courses</h4>

        <div class="row">


            <div class="col-md-3">
                <div class="card card__course">
                    <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                        <a class="card-header__title  justify-content-center align-self-center d-flex flex-column"
                            href="#">
                            <span><img src="{{ asset('dashboard/assets/images/logos/angular.svg') }}" class="mb-1"
                                    style="width:34px;" alt="logo"></span>
                            <span class="course__title">Angular</span>
                            <span class="course__subtitle">Typescript and Beyond</span>
                        </a>
                    </div>
                    <div class="p-3">
                        <div class="mb-2">
                            <span class="mr-2">
                                <a href="#" class="rating-link active"><i
                                        class="material-icons icon-16pt">star</i></a>
                                <a href="#" class="rating-link active"><i
                                        class="material-icons icon-16pt">star</i></a>
                                <a href="#" class="rating-link active"><i
                                        class="material-icons icon-16pt">star</i></a>
                                <a href="#" class="rating-link active"><i
                                        class="material-icons icon-16pt">star</i></a>
                                <a href="#" class="rating-link active"><i
                                        class="material-icons icon-16pt">star_half</i></a>
                            </span>
                            <strong>4.7</strong><br>
                            <small class="text-muted">(391 ratings)</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <strong class="h4 m-0">$49</strong>
                            <a href="#" class="btn btn-primary ml-auto"><i
                                    class="material-icons">add_shopping_cart</i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
