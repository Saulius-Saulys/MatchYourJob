@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Industry </h2>
            </div>
            <div class="pull-right">

                <a class="btn btn-success" href="{{ str_replace("https", "http", route('industry.create')) }}"
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
        <form action="{{ str_replace("https", "http", route('industry.index')) }}" method="GET">
            <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                   aria-describedby="search-addon"/>
        </form>
    </div>
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>category</th>
            <th>name</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($industries as $industry)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $industry->category }}</td>
                <td>{{ $industry->name }}</td>
                <td>{{ date_format($industry->created_at, 'jS M Y') }}</td>
                <td>{{ date_format($industry->updated_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ str_replace("https", "http", route('industry.destroy', $industry->id)) }}"
                          method="POST">

                        <a href="{{ str_replace("https", "http", route('industry.edit', $industry->id)) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button href="{{ str_replace("https", "http", route('industry.show', $industry->id)) }}"
                                type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $industries->links() !!}

@endsection
