@extends('admin.layout')

@section('Title','لوحه التحكم')

@section('Style','master.css')

@section('Content')

<div class="container mt-5">
    <h2>انشاء مستخدم</h2>
    <form method="POST" action="{{ route('User.store') }}">
        @csrf
        <div>
            <div class="mt-5 row">
                <div class="col">
                    <label for="Fname" class="form-label">الاسم الاول</label>
                    <input id="Fname" type="text"  placeholder="الاسم الاول" class="form-control @error('Fname') is-invalid @enderror" name="Fname" value="{{ old('Fname') }}" required autocomplete="Fname" autofocus>
                    @error('Fname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="Lname" class="form-label">الاسم الثاني</label>
                    <input id="Lname" type="text"  placeholder="الاسم الثاني" class="form-control @error('Lname') is-invalid @enderror" name="Lname" value="{{ old('Lname') }}" required autocomplete="Lname">
                    @error('Lname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mt-5 row">
                <div class="col">
                    <label for="Email" class="form-label"> البريد الالكتروني</label>
                    <input id="Email" type="text"  placeholder=" البريد الالكتروني" class="form-control @error('Email') is-invalid @enderror" name="Email" value="{{ old('Email') }}" required autocomplete="Email" autofocus>
                    @error('Email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="Phone" class="form-label">رقم الموبايل</label>
                    <input id="Phone" type="text"  placeholder="رقم الموبايل" minlength="11" maxlength="11" class="form-control @error('Phone') is-invalid @enderror" name="Phone" value="{{ old('Phone') }}" required autocomplete="Phone">
                    @error('Phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mt-5 row">
                <div class="col">
                    <label for="Password" class="form-label"> كلمة المرور</label>
                    <input id="Password" placeholder="كلمة المرور" minlength="10" maxlength="20" type="Password" class="form-control @error('Password') is-invalid @enderror" name="Password" required autocomplete="new-Password">
                    @error('Password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="birthdate" class="form-label">تاريخ الميلاد</label>
                    <input id="birthdate" type="date" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="mt-4 row">
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
            <input class="btn btn-primary mt-4" type="submit" value="تسجيل" />
        </div>
    </form>
</div>
@endsection
