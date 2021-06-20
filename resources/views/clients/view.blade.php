@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Client</div>

                    <div class="card-body">

                            <div class="form-group row">
                                <label for="name" class="">Client Name: {{ $client->name }}</label>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="">Client Surname: {{ $client->surname }}</label>
                            </div>
                    </div>

                    <label>Client #Tags :</label>
                    @foreach($client->tags as $tag)
                        <label>{{ $tag->name }}</label><br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
