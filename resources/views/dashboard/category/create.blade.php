@extends('dashboard.layout.main')
@include('alerts')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Category</h4>
                </div>
                <div class="card-form__body card-body">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name">
                        </div>
                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
