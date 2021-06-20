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
                    <div class="card-header">User Profile</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.edit', $user->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">User Name</label>

                                <div class="col-md-6">
                                    <input value="{{ $user->name }}" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">User Email</label>

                                <div class="col-md-6">
                                    <input value="{{ $user->email }}" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tags" class="col-md-4 col-form-label text-md-right">User #Tags: </label>

                                @if(count($user->tags ))
                                    @foreach($user->tags as $tag)
                                        <label id="tags">{{ $tag->name }} , </label>
                                    @endforeach
                                @else
                                    <div class="col-md-6">
                                        <label>No Tags Selected For This User</label>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label>Choose Tag For User (Hold CTRL to choose more than one)</label>

                                <select name="tags[]" class="custom-select" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $arrayOfUserTags)  ? 'selected' : '' }}
                                        >{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update User
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
