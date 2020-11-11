@extends('errors::minimal')

@section('title', __('Link Expired'))
@section('code', '402')
@section('message', 'Link Expired'))
@section('new_link')
<a href="{{ route('new-link', $exception->getMessage()) }}">Get New Link</a>    
@endsection
