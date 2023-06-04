@extends('layouts.master')

@section('title','Login Page')

@section('content')
<div class="login-form">
    <form action="" method="post">
        <div class="form-group">
            <label>Email Address</label>
            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
        </div>
        <div class="login-checkbox">
            <label>
                <input type="checkbox" name="remember">Remember Me
            </label>
            <label>
                <a href="#">Forgotten Password?</a>
            </label>
        </div>
        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
        <div class="social-login-content">
            <div class="social-button">
                <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
            </div>
        </div>
    </form>
    <div class="register-link">
        <p>
            Don't you have account?
            <a href="/register">Sign Up Here</a>
        </p>
    </div>
</div>
@endsection
