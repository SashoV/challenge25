@extends('errors::minimal')

@section('title', __('User Not Active'))
@section('code', '405')
@section('message', 'Check email for verification link or'))
@section('new_link')
<a href="{{ route('new-link', $exception->getMessage()) }}">click here to get new</a>    
@endsection