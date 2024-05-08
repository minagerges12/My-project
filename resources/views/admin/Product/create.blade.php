@extends('admin.layout')

@section('Title','لوحه التحكم')

@section('Style','master.css')

@section('Content')

<div class="container mt-5">
    <h2>اضافه منتج</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ route('Product.store') }}">
        @csrf
        <div>
            <div class="mt-5 row">
                <div class="col">
                    <label for="Category_Id" class="form-label">انظمة المراقبة</label>
                    <select class="form-select" name="Category_Id">
                        @foreach($Categories as $Category){
                            <option value="{{$Category->id}}">{{$Category->Name}}</option>
                        }
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="Supplier_Id" class="form-label">المورد</label>
                    <select class="form-select" name="Supplier_Id">
                        @foreach($Suppliers as $Supplier){
                            <option value="{{$Supplier->id}}">{{$Supplier->Name}}</option>
                        }
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-5 row">
                <div class="col">
                    <label for="Name" class="form-label">اسم المنتج</label>
                    <input id="Name" type="text"  placeholder="اسم المنتج" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{ old('Name') }}" required >
                    @error('Name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="Model" class="form-label">الموديل</label>
                    <input id="Model" name="Model" type="text"  placeholder="الموديل" class="form-control @error('Model') is-invalid @enderror" value="{{ old('Model') }}" required>
                    @error('Model')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="Color" class="form-label">اللون</label>
                    <input id="Color" name="Color" type="text"  placeholder="اللون" class="form-control @error('Color') is-invalid @enderror" value="{{ old('Color') }}" required >
                    @error('Color')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mt-5 row">
                <div class="col">
                    <label for="Qty" class="form-label">الكميه</label>
                    <input id="Qty" type="number"  placeholder="الكميه" class="form-control @error('Qty') is-invalid @enderror" name="Qty" value="{{ old('Qty') }}" required>
                    @error('Qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="Price" class="form-label">السعر</label>
                    <input id="Price" name="Price" type="number" placeholder="السعر" class="form-control @error('Price') is-invalid @enderror"  value="{{ old('Price') }}"  required>
                    @error('Price')
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
                    <input id="Description" name="Description" type="text"  placeholder="الوصف" class="form-control @error('Description') is-invalid @enderror" value="{{ old('Description') }}" required>
                    @error('Description')
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
