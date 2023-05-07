@extends('layouts.default')

@section('title', 'Home')

@section('index')

    @include('layouts.imagenav')

@endsection

@section('navbar-tr', 'uk-navbar-transparent')

@section('content')
    <div class="uk-container uk-margin-large-top">
        <div class="uk-flex uk-flex-middle">
            <div class="uk-width-1-2">
                <img src="{{ URL::asset('res/main2.png') }}" alt="" width="512">
            </div>
            <div class="uk-width-1-2 uk-margin-left">
                <h3>Lorem ipsum dolor.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel malesuada ante. Aenean ornare pellentesque sem ac vulputate. Duis malesuada libero libero, a faucibus urna egestas vitae. Nulla faucibus sapien malesuada, rhoncus nibh tempus, venenatis felis. Nullam volutpat at tellus at malesuada. Sed eleifend odio eget ultricies luctus. Sed blandit leo ut nulla ultricies semper. Ut at nulla est. Maecenas imperdiet mattis quam, ac ultrices leo facilisis non. </p>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-medium-top">
        <div class="uk-flex uk-flex-middle uk-flex-around">
            <div class="uk-width-1-2 uk-margin-right">
                <h3>Lorem ipsum dolor.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel malesuada ante. Aenean ornare pellentesque sem ac vulputate. Duis malesuada libero libero, a faucibus urna egestas vitae. Nulla faucibus sapien malesuada, rhoncus nibh tempus, venenatis felis. Nullam volutpat at tellus at malesuada. Sed eleifend odio eget ultricies luctus. Sed blandit leo ut nulla ultricies semper. Ut at nulla est. Maecenas imperdiet mattis quam, ac ultrices leo facilisis non. </p>
            </div>
            <div class="uk-width-1-2 uk-margin-medium-left uk-text-right">
                <img src="{{ URL::asset('res/main1.png') }}" alt="" width="512">
            </div>

        </div>
    </div>

@endsection
