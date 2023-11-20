@extends('dashboard.layout.main')
@include('alerts')
@section('content')
    <div style="margin-top: 6rem;" class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Course List</h4>
                    <a href="{{ route('course.create') }}" class="btn btn-primary float-right">Create Course</a>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Category</th>
                                <th>User</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->slug }}</td>
                                    <td>{{ $course->description }}</td>
                                    <td>{{ $course->start_date }}</td>

                                    <td>
                                        @if ($course->end_date)
                                            {{ $course->end_date }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $course->category->name }}</td>
                                    <td> {{ $course->user->name }}</td>

                                    <td>
                                        <a href="{{ route('course.edit', $course->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('course.destroy', $course->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
