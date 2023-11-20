@extends('dashboard.layout.main')
@include('alerts')



@section('content')
    <div class="container-fluid page__container" style="margin-top: 6rem";>
        <h4 class="card-header__title mb-3">Create Content</h4>
        <div class="card-form__body">
            <form method="POST" action="{{ route('content.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name Input -->
                <div class="form-group">
                    <label for="name">Content Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <!-- Section Selection -->
                <div class="form-group">
                    <label for="section_id">Select Section</label>
                    <!-- Assuming $sections is available from the controller -->
                    <select name="section_id" id="section_id" class="form-control" required>
                        <option value="" disabled selected>Select a section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Video Input -->
                <div class="form-group">
                    <label for="video">Upload Video</label>
                    <input type="text" name="video" id="video" class="form-control-file" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Content</button>
            </form>
        </div>
    </div>
@endsection

