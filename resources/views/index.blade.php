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
                <h3>Introducing the most secure password management tool on the web!</h3>
                <p>Our password manager offers encrypted storage for your most sensitive information, allowing you to securely store, manage, and access all of your passwords from a single, easy-to-use platform. Say goodbye to the hassle of remembering multiple passwords and the worry of compromised security. Our password manager provides you with peace of mind knowing that your data is secure, safeguarded by the latest encryption technology. Sign up today and experience the convenience and security of our password management tool. </p>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-medium-top">
        <div class="uk-flex uk-flex-middle uk-flex-around">
            <div class="uk-width-1-2 uk-margin-right">
                <h3>Introducing the most secure way to manage all your passwords, wherever you are in the world.</h3>
                <p>Our Password Manager website is available from any device and uses advanced encryption technology to ensure that your login details are always kept safe. With Password Manager, you can say goodbye to the stress of forgetting passwords, writing them down on paper, or using the same password across all your accounts. Our tool generates strong, unique passwords for each of your accounts and stores them safely in your online vault. Even better, you can access your vault from anywhere, at any time, and always have your passwords at your fingertips. With Password Manager, you can rest easy knowing that your personal and sensitive information is always protected. Sign up for our service today and take the first step towards a safer and more secure digital life. </p>
            </div>
            <div class="uk-width-1-2 uk-margin-medium-left uk-text-right">
                <img src="{{ URL::asset('res/main1.png') }}" alt="" width="512">
            </div>

        </div>
    </div>

@endsection
