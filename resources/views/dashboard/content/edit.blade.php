@extends('dashboard.layout.main')


@section('content')
    <div class="container-fluid page__container" style="margin-top: 6rem";>
        <h4 class="card-header__title mb-3">Edit Content</h4>
        <div class="card-form__body">
            <form method="POST" action="{{ route('content.update',$courseContent->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name Input -->
                <div class="form-group">
                    <label for="name">Content Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $courseContent->name }}" required>
                </div>

                <!-- Section Selection -->
                <div class="form-group">
                    <label for="section_id">Select Section</label>
                    <!-- Assuming $sections is available from the controller -->
                    <select name="section_id" id="section_id" class="form-control" required>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}" {{ $courseContent->section->id == $section->id ? 'selected' : '' }}>
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Video Input -->
                <div class="form-group">
                    <label for="video">Update Link</label>
                    <input type="text" name="video"  class="form-control-file" value="{{$courseContent->video}}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Content</button>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

