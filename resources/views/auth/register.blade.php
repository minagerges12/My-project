@extends('layouts.app')

@section('title',"تسجيل الدخول")

@section('style','login1.css')

@section('content')
    <div class="container">
        <div class="title">انشئ الحساب</div>
            <form method="POST" action="{{ route('register') }}">
                <div class="user-details">
                    @csrf
                    <div class="input-box">
                        <label for="Fname" class="details">الاسم الاول</label>
                        <input id="Fname" type="text"  placeholder="الاسم الاول" minlength="4" maxlength="12" class="@error('Fname') is-invalid @enderror" name="Fname" value="{{ old('Fname') }}" required autocomplete="Fname" autofocus>
                        @error('Fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <label for="Lname" class="details">الاسم الثاني</label>
                        <input id="Lname" type="text"  placeholder="الاسم الثاني" minlength="4" maxlength="12" class="@error('Lname') is-invalid @enderror" name="Lname" value="{{ old('Lname') }}" required autocomplete="Lname">
                        @error('Lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <label for="Email" class="details"> البريد الالكتروني</label>
                        <input id="Email" type="text"  placeholder=" البريد الالكتروني" class="@error('Email') is-invalid @enderror" name="Email" value="{{ old('Email') }}" required autocomplete="Email" autofocus>
                        @error('Email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <label for="Phone" class="details">رقم الموبايل</label>
                        <input id="Phone" type="text"  placeholder="رقم الموبايل" minlength="11" maxlength="11" class="@error('Phone') is-invalid @enderror" name="Phone" value="{{ old('Phone') }}" required autocomplete="Phone">
                        @error('Phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <label for="Password" class="details"> كلمة المرور</label>
                        <input id="Password" placeholder="كلمة المرور" minlength="10" maxlength="20" type="Password" class="form-control @error('Password') is-invalid @enderror" name="Password" required autocomplete="new-Password">
                        @error('Password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <label for="birthdate" class="details">تاريخ الميلاد</label>
                        <input id="birthdate" type="date" required>
                    </div>
                </div>
                <div class="gender-details">
                    <label for="Gender" class="gender-title">النوع</label>
                    <div class="category">
                        <label for="">
                            <input type="radio" name="Gender" value="male">
                            <label class="gender">ذكر</label>
                        </label>
                        <label for="">
                            <input type="radio" name="Gender" value="female">
                            <label class="gender">انثي</label>
                        </label>
                    </div>
                </div>
                <div class="link">
                    <input type="submit" value="تسجيل" />
                </div>
            </form>
        </div>
    </div>
@endsection
