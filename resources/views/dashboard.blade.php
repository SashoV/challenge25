@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}<a href="{{ route('create') }}" class="float-right">Add
                        new user</a></div>

                <div class="card-body">
                    <ol>
                        @foreach ($users as $user)
                        <li>{{ $user->name }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection