@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text">
            <div class="col-sm-11">
{{--                <div class="card">--}}
{{--                        <div class="card-header">Users</div>--}}

                        <table id="datatable" class="table bg-light table-hover display responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(', ', $user->roles()->get()->pluck('name') ->ToArray()) }}</td>
                                    <td>
                                        @can('edit-users')
                                        <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn-sm btn-outline-primary float-left">Edit</button></a>
                                        @endcan

                                        @can('delete-users')
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn-sm btn-outline-danger ml-2 float-left">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#datatable').dataTable({
                "responsive": true,
                "scrollY": "500px",
                "scrollCollapse": true,
                // "paging": false
            });
        });
    </script>
@endsection
