@extends('layouts.default')

@section('title', 'Generate new password')

@section('content')
    <div class="uk-container uk-margin-large-top">
        <h2>Here you can generate and save new password.</h2>
        <h4 class="uk-margin-remove-top">Click on "Save" button to redirect you to adding page.</h4>

        <hr class="uk-divider-icon">

        <form action="/generate" method="post" enctype="multipart/form-data">@csrf
            <label for='p'></label><input type='text' class="uk-input uk-width-1-1" id='p' name="generatedPassword" required readonly>
            <input type='button' id="sayDEgenerate" value ='generate' onclick='document.getElementById("p").value = Password.generate(16); document.getElementById("sayDEgenerate").value = "Regenerate";' class="uk-margin-top uk-button uk-button-default">
            <button type="submit" class="uk-button uk-button-primary uk-margin-top">
                Save
            </button>
        </form>
    </div>

<script>
    var Password = {

        _pattern : /[a-zA-Z0-9_\-\+\.]/,


        _getRandomByte : function()
        {
            if(window.crypto && window.crypto.getRandomValues)
            {
                var result = new Uint8Array(1);
                window.crypto.getRandomValues(result);
                return result[0];
            }
            else if(window.msCrypto && window.msCrypto.getRandomValues)
            {
                var result = new Uint8Array(1);
                window.msCrypto.getRandomValues(result);
                return result[0];
            }
            else
            {
                return Math.floor(Math.random() * 256);
            }
        },

        generate : function(length)
        {
            return Array.apply(null, {'length': length})
                .map(function()
                {
                    var result;
                    while(true)
                    {
                        result = String.fromCharCode(this._getRandomByte());
                        if(this._pattern.test(result))
                        {
                            return result;
                        }
                    }
                }, this)
                .join('');
        }
    };
</script>
@endsection
