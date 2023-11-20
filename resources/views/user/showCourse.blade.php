@extends('dashboard.layout.main')

@section('content')
    <div style="margin-top: 6rem;" class="container-fluid page__heading-container">
        <div
            class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div>
                <h1 class="m-lg-0">{{ $courseContent->name }}</h1>
                <div class="d-inline-flex align-items-center">
                    <i class="material-icons icon-16pt mr-1 text-muted">access_time</i> 2 <small
                        class="text-muted ml-1 mr-1">hours</small>: 26 <small class="text-muted ml-1">min</small>
                </div>
            </div>

        </div>
    </div>


    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/{{ substr(parse_url($courseContent->video, PHP_URL_QUERY), 2) }}"
                            allowfullscreen=""></iframe>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <img src="{{ asset('dashboard/assets/images/256_luke-porter-261779-unsplash.jpg') }}"
                                    alt="About Adrian" width="40" class="rounded-circle">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0"><a href="student-profile.html"
                                        class="text-body"><strong>{{ $teacher->name }}</strong></a></div>
                                <p class="text-muted mb-0">{{ $teacher->role }}</p>
                            </div>
                            <div class="media-right">
                                <a href="" class="btn btn-facebook btn-sm"><i class="fab fa-facebook"></i></a>
                                <a href="" class="btn btn-twitter btn-sm"><i class="fab fa-twitter"></i></a>
                                <a href="" class="btn btn-light btn-sm"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        Having over 12 years exp. Adrian is one of the lead UI designers in the industry Lorem ipsum dolor
                        sit amet, consectetur adipisicing elit. Facere, aut.
                    </div>
                </div>

                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Course Description</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <p>{{ $relatedCourses->description }}</p>
                    </div>
                </div>

            </div>


            <div class="col-md-4">


                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Course Lessons</h4>
                        </div>
                    </div>
                    @foreach ($relatedCourses->sections as $section)
                        <h3>{{ $section->name }}</h3>
                        <ul class="list-group list-group-fit">
                            @foreach ($section->content as $content)
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="text-muted">1.</div>
                                        </div>
                                        <div class="media-body">
                                            <a
                                                href="{{ route('user.course.showVideo', $content->id) }}">{{ $content->name }}</a>
                                        </div>
                                        <div class="media-right">
                                            <small class="text-muted">3:33</small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Course Matrial</h4>
                        </div>
                    </div>

                    <ul class="list-group list-group-fit">
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
