@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid page__container">
        <h4 class="card-header__title mb-3">Edit Section</h4>
        <div class="card-form__body">
            <!-- Your form for editing the section goes here -->
            <form method="POST" action="{{ route('section.update', $section->id) }}">
                @csrf
                @method('PUT')

                <!-- Your form fields go here -->
                <!-- Example: -->
                <div class="form-group">
                    <label for="name">Section Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $section->name }}">
                </div>

                <div class="form-group">
                    <label for="course_id">Course</label>
                    <!-- Assuming $courses is available from the controller -->
                    <select name="course_id" id="course_id" class="form-control">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $course->id == $section->course_id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Section</button>
            </form>
        </div>
    </div>
@endsection
