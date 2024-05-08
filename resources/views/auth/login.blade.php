@extends('layouts.app')

@section('title',"تسجيل الدخول")

@section('style','login.css')

@section('content')

<div class="form">
    <div class="content">
        <h1>تسجيل الدخول</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input id="email" type="email"  placeholder="البريد الالكتروني"  class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" placeholder="باسورد " type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit">تسجيل</button>
        </form>
        <br>
        <p>هل انت جديد في الموقع ؟</p>
        <a href="{{ route('register') }}">انشاء حساب جديد</a>
        <br>
    </div>
</div>
@endsection
