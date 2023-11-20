@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid page__container">
        <h4 class="card-header__title mb-3">All Users</h4>
        <div class=" card-form__body">

            <div class="col-lg-8 card-form__body card-body">
                {{-- the form --}}
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter your name  .." value="{{ $user->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter your email address .." value="{{ $user->email }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> role</label>
                        {{-- <input type="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter your email address .." value="{{ $user->role }}"> --}}
                        <select name="role" id="">
                            <option value="" selected disabled>{{ $user->role }}</option>
                            <option value="admin">admin</option>
                            <option value="student">student</option>
                            <option value="teacher">teacher</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
{{-- value="{{ old('name') }}" --}}
