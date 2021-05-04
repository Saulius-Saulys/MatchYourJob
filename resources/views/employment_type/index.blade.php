@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employment type </h2>
            </div>
            <div class="pull-right">

                <a class="btn btn-success" href="{{ str_replace("https", "http", route('employment_type.create')) }}"
                   title="Create a project"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="input-group rounded">
        <form action="{{ str_replace("https", "http", route('employment_type.index')) }}" method="GET">
            <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon"/>
        </form>
    </div>
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employmentTypes as $employmentType)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $employmentType->name }}</td>
                <td>{{ date_format($employmentType->created_at, 'jS M Y') }}</td>
                <td>{{ date_format($employmentType->updated_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ str_replace("https", "http", route('employment_type.destroy', $employmentType->id)) }}"
                          method="POST">

                        <a href="{{ str_replace("https", "http", route('employment_type.edit', $employmentType->id)) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button href="{{ str_replace("https", "http", route('employment_type.show', $employmentType->id)) }}"
                                type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection
