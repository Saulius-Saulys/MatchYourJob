@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users </h2>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="input-group rounded">
        <form action="{{ str_replace("https", "http", route('users.index')) }}" method="GET">
            <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon"/>
        </form>
    </div>
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td>{{ date_format($user->created_at, 'jS M Y') }}</td>
                <td>{{ date_format($user->updated_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ str_replace("https", "http", route('users.destroy', $user->id)) }}"
                          method="POST">


                        <a href="{{ str_replace("https", "http", route('users.edit', $user->id)) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        <a href="{{ str_replace("https", "http", route('users.edit', $user->id)) }}">
                            <i class="fas fa-user-slash text-danger"></i>
                        </a>
                    </form>
                </td>
        @endforeach
    </table>

@endsection
