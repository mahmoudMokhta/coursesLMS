@extends('dashboard.layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Course Description -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Course Description</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ $courseContents->description }}</p>

                    </div>
                </div>

                <!-- List of Course Videos -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Course Videos</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($courseContents->sections as $section)
                            <h2>{{ $section->name }}</h2>
                            <ul>
                                @foreach ($section->content as $content)
                                    <li>
                                        <a href="{{ route('user.course.showVideo', $content->id) }}">{{ $content->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach

                    </div>
                </div>
            </div>

            <!-- Instructor Section -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <img src="https://laracasts.com/images/default-square-avatar.jpg" alt="Instructor"
                                class="rounded-circle mr-3" width="50">
                            <div class="media-body">
                                <h5 class="mb-0">{{ $teacher->name }}</h5>
                                <p class="text-muted mb-0">{{ $teacher->role }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Join Jeffrey Way in this Code Breaking Workshop where he...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
