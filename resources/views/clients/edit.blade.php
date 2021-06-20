@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Update Client</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('clients.update', $client) }}">
                            @csrf

                            {{ method_field('PUT') }}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Client Name</label>

                                <div class="col-md-6">
                                    <input value="{{ $client->name }}" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">CLient Surname</label>

                                <div class="col-md-6">
                                    <input value="{{ $client->surname }}" id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autocomplete="surname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label>Choose Tag For Client (Hold CTRL to choose more than one)</label>

                                <select name="tags[]" class="custom-select" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $arrayOfClientTags)  ? 'selected' : '' }}
                                        >{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Client
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
