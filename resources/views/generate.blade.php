@extends('layouts.default')

@section('title', 'Generate new password')

@section('content')
    <div id="generated"></div>
    <button onclick="sayDEgenerate()">Press me!</button>

    <script>
        function sayDEgenerate() {
            document.getElementById("generated").innerHTML = Math.random().toString(36).slice(-12);
        }
    </script>
@endsection
