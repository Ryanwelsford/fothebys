@extends('layouts.master-user')

@section('title', $title)
@section('content')
@if(isset($alert))
    {{ $alert->build() }}
@endif
<div class="my-2 bg-secondary text-white p-2 banner">
    <div class="container login-box">
        <h2 class="divide-spacer">Login</h2>

        <form class="" action="{{ Route('login') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" type="text" name="email" value="@if(isset($user['email'])) {{ $user['email'] }} @endif">
                @error('email')
                    <div class="error-feedback">{{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" type="text" name="password">
                @error('password')
                    <div class="error-feedback">{{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Stay signed in</label>
              </div>
            <button type="submit" class="btn btn-primary bt-fn mt-2">Login</button>

            <div class="d-flex justify-content-center">
                <a class="fancy-font login-logo" href="{{ route("home") }}">Fothebys <img src="/images/logo-450.png" class="logo-img"></a>
            </div>
        </form>
    </div>
</div>
@endsection
