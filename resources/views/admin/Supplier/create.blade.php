@extends('admin.layout')

@section('Title','لوحه التحكم')

@section('Style','master.css')

@section('Content')

<div class="container mt-5">
    <h2>اضافه مورد</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ route('Supplier.store') }}">
        @csrf
        <div>
            <div class="mt-5 row">
                <div class="col">
                    <label for="Name" class="form-label">اسم المورد</label>
                    <input id="Name" type="text"  placeholder="اسم المورد" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{ old('Name') }}" required >
                    @error('Name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="Phone" class="form-label">رقم التليفون</label>
                    <input id="Phone" name="Phone" type="text"  placeholder="رقم التليفون" minlength="11" maxlength="11" class="form-control @error('Phone') is-invalid @enderror" value="{{ old('Phone') }}" required>
                    @error('Phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="Address" class="form-label">العنوان</label>
                    <input id="Address" name="Address" type="text"  placeholder="العنوان" class="form-control @error('Address') is-invalid @enderror" value="{{ old('Address') }}" required >
                    @error('Address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mt-5 row">
                <div class="col">
                    <label for="Email" class="form-label">البريد الالكتروني</label>
                    <input id="Email" type="email"  placeholder="البريد الالكتروني" class="form-control @error('Email') is-invalid @enderror" name="Email" value="{{ old('Email') }}" required>
                    @error('Email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="mt-4 row">
            <input class="btn btn-primary mt-4" type="submit" value="حفظ" />
        </div>
    </form>
</div>

@endsection
