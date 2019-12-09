@extends('layouts.app')

<title>Register</title>


@section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Register</h5>
                            <form method="POST" action="{{ route('register') }}" class="form-signin">
                                @csrf

                                <div class="form-label-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                    <label for="name">{{ __('Full Name') }}</label>

                                </div>

                                <div class="form-label-group">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                    <label for="username">{{ __('Username') }}</label>
                                </div>


                                <div class="form-label-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                    <label for="email">{{ __('Email Address') }}</label>
                                </div>

                                <hr>

                                <div class="form-label-group">
                                    <input id="password" type="password" placeholder="Password must be 8 characters" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                    <label for="password">{{ __('Password') }}</label>
                                </div>

                                <div class="form-label-group">
                                    <input id="password-confirm" type="password" placeholder="Enter again your password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                </div>
                                <br>

                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                                <br>
                                <div class="text-center">
                                    <p> Already have an account? <a href="/login">Sign In</a></p>
                                </div>
                                <hr class="my-2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

