@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
            <div class="alert alert-danger col-md-12" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group @error('email') has-error @enderror">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                        value="{{ old('email') }}">
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Cancel</a>
                <button type="submit" class="btn btn-info">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection