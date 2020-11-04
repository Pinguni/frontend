@extends('layouts.app')

@section('content')
<main class="narrow">
    <form method="POST" action="{{ route('register') }}" class="narrow">
        @csrf

        <h3>Register</h3>

        <label for="name">{{ __('Name') }}</label>
        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="email">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

        <button type="submit" class="dark">
            {{ __('Register') }}
        </button>
    </form>
</main>
@endsection
