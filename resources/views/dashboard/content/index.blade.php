@extends('dashboard.layout.main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid page__container" style="margin-top: 6rem";>
        <h4 class="card-header__title mb-3">Create Content</h4>
        <div class=" card-form__body">
            <div class=" card-form__body card-body">
                <div class="row ">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Content</h3>
                                <a href="{{ route('content.create') }}" class="btn btn-primary float-right">Create
                                    Content</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($courseContents) > 0)
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Section Name</th>
                                                <th>Controller</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courseContents as $content)
                                                <tr>
                                                    <td>
                                                        {{ $content->name }}
                                                    </td>
                                                    <td>
                                                        {{ $content->section->name }}
                                                    </td>
                                                    <td class="project-actions text-right">

                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('content.edit', $content->id) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm content-delete"
                                                            data-id="{{ $content->id }}">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                @else
                                    <h2>
                                        No Course Contents Found!
                                    </h2>
                                @endif
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.content-delete').click(function() {
                let contentId = $(this).data('id');
                if (confirm('Are you sure you want to delete this Content?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route('content.destroy', '') }}' + '/' + contentId,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            // Handle success, for example, remove the item from the page
                            // alert('Role deleted successfully');
                            window.location.reload();
                            // You may want to reload the page or update the UI in some way
                        },
                        error: function(err) {
                            // Handle errors, such as displaying an error message
                            console.log(err);
                        }
                    });
                }
            });
        });
    </script>
@endsection
