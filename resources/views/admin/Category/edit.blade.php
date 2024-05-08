@extends('admin.layout')

@section('Title','لوحه التحكم')

@section('Style','master.css')

@section('Content')

<div class="container mt-5">
    <h2>تعديل نظام مراقبه</h2>
    <form method="POST"  enctype="multipart/form-data" action="{{ route('Category.update',$Category->id) }}">
        @csrf
        @method('PUT')
        <div>
            <div class="mt-5 row">
                <div class="col">
                    <label for="Name" class="form-label">اسم النظام</label>
                    <input id="Name" name="Name" type="text" placeholder="اسم النظام" class="form-control @error('Name') is-invalid @enderror"  value="{{ $Category->Name }}" >
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
                    <input id="Image" type="file" class="form-control" name="Image" accept="image/png, image/jpeg">
                </div>

                <div class="col">
                    <label for="Description" class="form-label">الوصف</label>
                    <input id="Description" name="Description" type="text"  placeholder="الوصف" class="form-control @error('Description') is-invalid @enderror" value="{{ $Category->Description }}" >
                    @error('Description')
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
