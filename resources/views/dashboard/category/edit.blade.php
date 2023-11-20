@extends('dashboard.layout.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-form__body card-body">
                    <form method="POST" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}">
                        </div>

                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
