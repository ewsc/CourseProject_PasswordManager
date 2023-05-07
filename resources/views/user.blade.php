@extends('layouts.default')

@section('title', 'Profile')

@section('content')

    <div class="uk-container uk-margin-medium-top">
        <h2><span uk-icon="user" class="uk-margin-small-right"></span>{{ Auth::user()->name }}</h2>
        <h4 class="uk-text-muted uk-margin-remove-top">Email: {{ Auth::user()->email }}<br>Registered: {{ Auth::user()->created_at->format('d.m.y, H:s') }}</h4>
    </div>

@endsection
