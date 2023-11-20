@extends('dashboard.layout.main')
@include('alerts')
@section('content')
    <div class="container-fluid page__container" style="margin-top: 6rem">
        <h4  class="card-header__title mb-3" >Create Section</h4>
        <div class="card-form__body" >
            <form method="POST" action="{{ route('section.store') }}">
                @csrf


                <!-- Section Name -->
                <div class="form-group">
                    <label for="name">Section Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <!-- Courses Dropdown -->
                <div class="form-group">
                    <label for="course_id">Select Course</label>
                    <!-- Assuming $courses is available from the controller -->
                    <select name="course_id" id="course_id" class="form-control" required>
                        <option value="" disabled selected>Select a course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Section</button>
            </form>
        </div>
    </div>
@endsection
