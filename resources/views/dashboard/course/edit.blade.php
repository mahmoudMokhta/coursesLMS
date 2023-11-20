@extends('dashboard.layout.main')
@include('alerts')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Course</h4>
                </div>
                <div class="card-form__body card-body">
                    <form method="POST" action="{{ route('course.update', $course->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $course->name }}">
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug" value="{{ $course->slug }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" name="description">{{ $course->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input id="start_date" type="date" class="form-control" name="start_date" value="{{ $course->start_date }}">
                        </div>

                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input id="end_date" type="date" class="form-control" name="end_date" value="{{ $course->end_date }}">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select id="user_id" class="form-control" name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $course->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
