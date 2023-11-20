@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid page__container">
        <h4 class="card-header__title mb-3">Create Section</h4>
        <div class=" card-form__body">
            <div class=" card-form__body card-body">
                <div class="row ">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Section</h3>
                                <a href="{{ route('section.create') }}" class="btn btn-primary float-right">Create
                                    Section</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Section Name</th>
                                        <th>Course</th>
                                        <th>Controller</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($sections as $section)
                                        <tr>
                                            <td>
                                                {{ $section->name }}
                                            </td>
                                            <td>
                                                {{ $section->course->name }}
                                            </td>
                                            <td class="project-actions text-right">

                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('section.edit', $section->id) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm section-delete"
                                                   data-id="{{ $section->id }}">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
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
            $('.section-delete').click(function() {
                let sectionId = $(this).data('id');
                if (confirm('Are you sure you want to delete this Section?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route('section.destroy', '') }}' + '/' + sectionId,
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
