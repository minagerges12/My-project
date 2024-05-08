@extends('admin.layout')

@section('Title','لوحه التحكم')

@section('Style','master.css')

@section('Content')

<div class="container mt-5">
    <h2>تعديل عرض</h2>
    <form method="POST"  enctype="multipart/form-data" action="{{ route('Offer.update',$Offer->id) }}">
        @csrf
        @method('PUT')
        <div>
            <div class="mt-5 row">
                <div class="col">
                    <label for="Product_Id" class="form-label">المنتج</label>
                    <select class="form-select" name="Product_Id">
                        @foreach($Products as $Product){
                            @if ($Offer->id == $Product->id)
                                <option selected value="{{$Product->id}}">{{$Product->Name}}</option>
                            @else
                                <option value="{{$Product->id}}">{{$Product->Name}}</option>
                            @endif
                        }
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="Qty" class="form-label">الكميه</label>
                    <input id="Qty" type="number" placeholder="الكميه" class="form-control @error('Qty') is-invalid @enderror" name="Qty" value="{{ $Offer->Qty }}">
                    @error('Qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="Total" class="form-label">السعر الكلي</label>
                    <input id="Total" name="Total" type="number" placeholder="السعر الكلي" class="form-control @error('Total') is-invalid @enderror"  value="{{ $Offer->Total }}" >
                    @error('Total')
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
                    <input id="Description" name="Description" type="text"  placeholder="الوصف" class="form-control @error('Description') is-invalid @enderror" value="{{ $Offer->Description }}" >
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
