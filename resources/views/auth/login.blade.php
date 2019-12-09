@extends('layouts.app')

<style>
    html,
    body {
        height: 100%;
    }

    /*body {*/
    /*    display: -ms-flexbox;*/
    /*    display: flex;*/
    /*    -ms-flex-align: center;*/
    /*    align-items: center;*/
    /*    padding-top: 40px;*/
    /*    padding-bottom: 40px;*/
    /*    background-color: #f5f5f5;*/
    /*}*/

    .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 15px;
        margin: auto;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-label-group > input,
    .form-label-group > label {
        height: 3.125rem;
        padding: .75rem;
    }

    .form-label-group > label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0; /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        pointer-events: none;
        cursor: text; /* Match the input under the label */
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
    }

    .form-label-group input:not(:placeholder-shown) ~ label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
    }

    .text {
        color: whitesmoke;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .position{
        padding-top: 100px;
        padding-bottom: 50px;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

@section('content')
    <div class="position">
        <form method="POST" action="{{ route('login') }}" class="form-signin">
            @csrf
            <div class="text-center mb-4">
                <img class="mb-4 " src="{{asset('/img/honda-logo1.png')}}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal text text-center">Sign in</h1>
            </div>

            <div class="form-label-group">
                    <input id="username" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label for="username">Username</label>
            </div>

            <div class="form-label-group">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3 text-center">
                <label class="text">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

            <p class="mt-5 mb-3 text-center text-muted">&copy; Bendelorm Technologies</p>
        </form>
    </div>
@endsection

