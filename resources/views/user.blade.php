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

                <div class="">
                    <button class="uk-button uk-button-default" type="button" uk-toggle="target: #edit-modal-{{ $password->id }}">
                        Edit
                    </button>

                    <button class="uk-button uk-button-danger" uk-toggle="target: #delete-modal-{{ $password->id }}">
                        Delete
                    </button>

                    <button class="uk-button uk-button-default" onclick="copyPass()">
                        Copy password
                    </button>
                </div>

                <script>
                    function copyPass() {
                        let copyText = document.getElementById("PID{{ $password->id }}");
                        navigator.clipboard.writeText(copyText.textContent);
                        UIkit.notification({message: 'Text copied' + copyText.textContent, pos: 'bottom-right'});
                    }
                </script>

                <style>
                    #PID{{ $password->id }}:hover:after {
                        transition: 300ms linear;
                        content: '{{ $password->pass_pass }}';
                    }
                </style>

                <div id="delete-modal-{{ $password->id }}" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <h2 class="uk-modal-title">Are you sure that you want to delete password <i>"{{ $password->pass_name }}"</i></h2>
                        <p>This action can't be undone.</p>
                        <p class="uk-text-right">
                        <form action="/user" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $password->id }}">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-danger" type="submit">Delete</button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>




@endsection
