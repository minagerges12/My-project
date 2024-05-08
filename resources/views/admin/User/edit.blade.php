@extends('admin.layout')

@section('Title','لوحه التحكم')

@section('Style','master.css')

@section('Content')

<div class="container mt-5">
    <h2>تعديل مستخدم</h2>
    <form method="POST" action="{{ route('User.update',$User->id) }}">
        @csrf
        @method('PUT')

        <div>
            <div class="mt-5 row">
                <div class="col">
                    <label for="Fname" class="form-label">الاسم الاول</label>
                    <input id="Fname" type="text"  placeholder="الاسم الاول" class="form-control @error('Fname') is-invalid @enderror" name="Fname" value="{{ $User->Fname }}">
                    @error('Fname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="Lname" class="form-label">الاسم الثاني</label>
                    <input id="Lname" type="text"  placeholder="الاسم الثاني" class="form-control @error('Lname') is-invalid @enderror" name="Lname" value="{{ $User->Lname }}">
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
                    <input id="Email" type="text"  placeholder=" البريد الالكتروني" class="form-control @error('Email') is-invalid @enderror" name="Email" value="{{ $User->email }}">
                    @error('Email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="Phone" class="form-label">رقم الموبايل</label>
                    <input id="Phone" type="text"  placeholder="رقم الموبايل" minlength="11" maxlength="11" class="form-control @error('Phone') is-invalid @enderror" name="Phone" value="{{ $User->Phone }}">
                    @error('Phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
        </div>
        <div class="mt-4 row">
            <input class="btn btn-primary mt-4" type="submit" value="تعديل" />
        </div>
    </form>
</div>
@endsection
