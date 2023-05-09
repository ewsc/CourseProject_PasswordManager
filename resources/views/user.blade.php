@extends('layouts.default')

@section('title', 'Profile')

@section('content')

    <div class="uk-container uk-margin-medium-top">
        <h2><span uk-icon="user" class="uk-margin-small-right"></span>User: {{ Auth::user()->name }}</h2>
        <h4 class="uk-text-muted uk-margin-remove-top">Email: {{ Auth::user()->email }}<br>Registered at: {{ Auth::user()->created_at->format('d.m.y, H:s') }}</h4>

        <h2><span uk-icon="bolt" class="uk-margin-small-right"></span>Actions</h2>
        <a href="/add" class="uk-button uk-button-default">
            Add new
        </a>
        <a href="/generate" class="uk-button uk-button-default">
            Generate new
        </a>
        <a href="#" class="uk-button uk-button-default" onclick="UIkit.notification({message: 'Yeah, keep waiting!', pos: 'bottom-right'});">
            Wait for something new...
        </a>

        <h2><span uk-icon="lock" class="uk-margin-small-right"></span>Your passwords</h2>
        @forelse($user_passwords as $password)
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

                <div id="edit-modal-{{ $password->id }}" class="uk-modal-container" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body ">
                        <h2 class="uk-modal-title">Editing <i>"{{ $password->pass_name }}"</i></h2>
                        <form method="post" action="/user" enctype="multipart/form-data">
                            @csrf
                            <div class="uk-container">
                                <h3 class="uk-margin-small-bottom">Password name</h3>
                                <label>
                                    <input type="text" class="uk-input uk-width-1-1" placeholder="Input password name" name="name" maxlength="100" required value="{{ $password->pass_name }}">
                                </label>

                                <h3 class="uk-margin-small-bottom">Password itself</h3>
                                <div id="StrengthDisp"></div>
                                <label>
                                    <input type="text" class="uk-input uk-width-1-1" placeholder="Input password itself" name="password" id="PassEntry" maxlength="20" required  value="{{ $password->pass_pass }}">
                                </label>
                                <p class="uk-text-muted uk-margin-small-top uk-margin-left">*The recommended password length is 6 characters minimum. Also, the password must contain mixed case letters, numbers and special characters.</p>

                                <h3 class="uk-margin-small-bottom">Password keyword</h3>
                                <label>
                                    <input type="text" class="uk-input uk-width-1-1" placeholder="Input password keyword" name="keyword" maxlength="200" required value="{{ $password->pass_key }}">
                                </label>
                                <p class="uk-text-muted uk-margin-small-top uk-margin-left"><span class="uk-text-warning">*Attention!</span> The hint should not be too obvious, it should only remind you of the password.</p>
                                <input type="hidden" name="formtype" value="0">
                                <input type="hidden" name="id" value="{{ $password->id }}">
                                <div class="uk-text-right uk-margin-medium-top uk-margin-medium-bottom">
                                    <button type="submit" class="uk-button uk-button-primary">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="delete-modal-{{ $password->id }}" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <h2 class="uk-modal-title">Are you sure that you want to delete password <i>"{{ $password->pass_name }}"</i></h2>
                        <p>This action can't be undone.</p>
                        <p class="uk-text-right">
                            <form action="/user" enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $password->id }}">
                                <input type="hidden" name="formtype" value="1">
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                <button class="uk-button uk-button-danger" type="submit">Delete</button>
                            </form>
                        </p>
                    </div>

                </div>
            </div>
        @empty
            <div class="uk-margin-top uk-card uk-card-body uk-width-1-1 uk-card-default uk-card-hover">
                <h4 class="uk-margin-remove-bottom"><span uk-icon="android" class="uk-margin-small-right"></span>Wow, such an empty place here...</h4>
                <h4 class="uk-margin-small-top uk-margin-remove-bottom"><span uk-icon="question" class="uk-margin-small-right"></span>You have some secrets, don't you?</h4>
                <h4 class="uk-margin-small-top"><span uk-icon="happy" class="uk-margin-small-right"></span>You can always fill this place with some secrets!</h4>
            </div>
        @endforelse
    </div>

    <script>
        let timeout;
        let password = document.getElementById('PassEntry')
        let strengthBadge = document.getElementById('StrengthDisp')
        let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
        let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')

        function StrengthChecker(PasswordParameter){
            if(strongPassword.test(PasswordParameter)) {
                strengthBadge.className = "uk-text-success uk-margin-small-bottom uk-margin-remove-top"
                strengthBadge.textContent = 'Strong'
            } else if(mediumPassword.test(PasswordParameter)){
                strengthBadge.className = 'uk-text-warning uk-margin-small-bottom uk-margin-remove-top'
                strengthBadge.textContent = 'Medium'
            } else{
                strengthBadge.className = 'uk-text-danger uk-margin-small-bottom uk-margin-remove-top'
                strengthBadge.textContent = 'Weak password'
            }
        }

        password.addEventListener("input", () => {
            strengthBadge.style.display= 'block'
            clearTimeout(timeout);
            timeout = setTimeout(() => StrengthChecker(password.value), 500);
            if(password.value.length !== 0){
                strengthBadge.style.display !== 'block'
            } else{
                strengthBadge.style.display = 'none'
            }
        });
    </script>

@endsection
