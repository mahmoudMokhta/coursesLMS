@extends('dashboard.layout.main')

@section('content')
    <div class=" page__container">
        <h4 style="margin-top: 6rem;" class="card-header__title mb-3">Users</h4>
        <div class=" card-form__body">
            <div class=" card-form__body card-body">
                <div class="row ">
                    <div class="col-12">
                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>create at</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="staff">
                                @foreach ($users as $user)
                                    <tr class="">
                                        <td>
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-xs mr-2">
                                                    <img src="{{ asset('download.jpeg') }}" alt="Avatar"
                                                        class="avatar-img rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <span class="js-lists-values-employee-name">{{ $user->name }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge ">{{ $user->email }}</span></td>
                                        @if ($user->role == 'admin')
                                            <td><span class="badge badge-sucsses">{{ $user->role }}</span></td>
                                        @elseif ($user->role == 'teacher')
                                            <td><span class="badge badge-warning ">{{ $user->role }}</span></td>
                                        @else
                                            <td><span class="badge badge-primary ">{{ $user->role }}</span></td>
                                        @endif
                                        <td><small class="text-muted">{{ $user->created_at->format('Y-m-d') }}</small></td>
                                        <td>
                                            <div class="d-flex justify-content-around ">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>



    </div>
@endsection
