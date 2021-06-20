@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Clients Table</div>

                    <a type="button" class="btn btn-primary"
                       href="{{ route('clients.create') }}"
                    >Create New Client</a>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($clients))
                                    @foreach($clients as $client)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->surname }}</td>
                                        <td>
                                            <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('clients.show', $client->id) }}">View</a>
                                                <a class="btn btn-primary" href="{{ route('clients.edit', $client->id) }}">Edit</a>

                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>No Clients Found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
