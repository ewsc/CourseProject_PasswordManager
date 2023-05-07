@extends('layouts.default')

@section('title', 'Profile')

@section('content')

    <div class="uk-container uk-margin-medium-top">
        <h2><span uk-icon="user" class="uk-margin-small-right"></span>{{ Auth::user()->name }}</h2>
        <h4 class="uk-text-muted uk-margin-remove-top">Email: {{ Auth::user()->email }}<br>Registered at: {{ Auth::user()->created_at->format('d.m.y, H:s') }}</h4>

        <h2><span uk-icon="lock" class="uk-margin-small-right"></span>Your passwords</h2>
        @foreach($user_passwords as $password)
            <div class="uk-margin-top uk-card uk-card-body uk-width-1-1 uk-card-default uk-card-hover">
                <h4 class="uk-margin-remove-bottom"><span uk-icon="tag" class="uk-margin-small-right"></span>Password name: <i>{{ $password->pass_name }}</i></h4>
                <h4 class="uk-margin-small-top uk-margin-remove-bottom"><span uk-icon="commenting" class="uk-margin-small-right"></span>Password keyword: <i>{{ $password->pass_key }}</i></h4>
                <h4 class="uk-margin-small-top"><span uk-icon="lock" class="uk-margin-small-right"></span>Password: <i class="custom-hide-text" id="PID{{ $password->id }}"><span></span></i> (hover)</h4>

                <style>
                    #PID{{ $password->id }}:hover:after {
                        content: '{{ $password->pass_pass }}';
                    }
                </style>
            </div>
        @endforeach
    </div>

@endsection
