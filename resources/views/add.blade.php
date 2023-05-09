@extends('layouts.default')

@section('title', 'Adding new password')

@section('content')

    <div class="uk-margin-medium-top">
        <form method="post" action="/add" enctype="multipart/form-data">
            @csrf
            <div class="uk-container">
                <h2>Adding new password</h2>
                <h3 class="uk-margin-small-bottom">Password name</h3>
                <label>
                    <input type="text" class="uk-input uk-width-1-1" placeholder="Input password name" name="name" maxlength="100" required>
                </label>

                <h3 class="uk-margin-small-bottom">Password itself</h3>
                <div id="StrengthDisp"></div>
                <label>
                    <input type="password" class="uk-input uk-width-1-1" placeholder="Input password itself" name="password" id="PassEntry" maxlength="20" required @if ($errors->any())value="{{ $errors->first() }}"@endif>
                </label>
                <div class="uk-margin-small-top">
                    <label>
                        <input type="checkbox" onclick="revealPassword()" class="uk-checkbox"> Reveal password
                    </label>
                </div>
                <p class="uk-text-muted uk-margin-small-top uk-margin-left">*The recommended password length is 6 characters minimum. Also, the password must contain mixed case letters, numbers and special characters.</p>

                <h3 class="uk-margin-small-bottom">Password keyword</h3>
                <label>
                    <input type="text" class="uk-input uk-width-1-1" placeholder="Input password keyword" name="keyword" maxlength="200" required>
                </label>
                <p class="uk-text-muted uk-margin-small-top uk-margin-left"><span class="uk-text-warning">*Attention!</span> The hint should not be too obvious, it should only remind you of the password.</p>

                <div class="uk-text-right uk-margin-medium-top uk-margin-medium-bottom">
                    <button type="submit" class="uk-button uk-button-primary">Add</button>
                </div>
            </div>
        </form>
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

        function revealPassword() {
            var x = document.getElementById("PassEntry");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

@endsection
