@extends('admin.layout')

@section('Title','لوحه التحكم')

@section('Style','master.css')

@section('Content')

<div class="container mt-5">
    <h2>نظام مراقبه</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ route('Category.store') }}">
        @csrf
        <div>
            <div class="mt-5 row">
                <div class="col">
                    <label for="Name" class="form-label">اسم النظام</label>
                    <input id="Name" name="Name" type="text" placeholder="اسم النظام" class="form-control @error('Name') is-invalid @enderror"  value="{{ old('Name') }}"  required>
                    @error('Name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mt-5 row">
                <div class="col">
                    <label for="Image" class="form-label"> الصوره</label>
                    <input id="Image" type="file" class="form-control" name="Image" accept="image/png, image/jpeg" required>
                </div>

                <div class="col">
                    <label for="Description" class="form-label">الوصف</label>
                    <input id="Description" name="Description" type="text"  placeholder="الوصف" class="form-control @error('Description') is-invalid @enderror" value="{{ old('Description') }}" required autocomplete="Description">
                    @error('Description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        <div class="mt-4 row">
            <input class="btn btn-primary mt-4" type="submit" value="حفظ" />
        </div>
    </form>
</div>

@endsection
