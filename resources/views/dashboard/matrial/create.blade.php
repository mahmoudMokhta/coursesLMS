@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid page__container">
        <h4 style="margin-top: 6rem;" class="card-header__title mb-3">Create Matrial</h4>
        <div class=" card-form__body">
            <div class="col-lg-8 card-form__body card-body">
                @if (count($allCourseContent) > 0)
                    <form action="{{ route('matrial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="select01">Basic</label>
                            <select name="coursContent" id="select01" data-toggle="select" class="form-control">
                                @foreach ($allCourseContent as $courseContent)
                                    <option value="{{ $courseContent->id }}">{{ $courseContent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">matrial</label>
                            <input name="matrialFile" class="form-control" type="file" id="formFileMultiple" multiple>
                            @error('matrialFile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @else
                    <h1>no lessons created</h1>
                @endif
            </div>
        </div>

    </div>
@endsection
{{-- {{ Storage::url($user->profile_picture) }} --}}
