@extends('admin.layout')

@section('Title','لوحة التحكم')

@section('Style','master.css')

@section('Content')

<h2 class="my-5">
    <span class="float-end"> تفاصل الاوردر</span>
    {{-- <a href="{{route('Category.create')}}" class="btn btn-primary float-start">+</a> --}}
</h2>  
<div class="clearfix"></div>
<table class="table table-striped mt-5">
    <thead>
    <tr>
        <th style="min-width: 150px">اسم الصنف</th>
        <th>الكميه</th>
        <th>اجمالي سعر الصنف</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($Order->Products as $OrderProduct)
            <tr>
                <td>{{$OrderProduct->Product->Name}}</td>
                <td>{{$OrderProduct->Qty}}</td>
                <td>{{$OrderProduct->Total}}</td>
            </tr>
        @endforeach
        @foreach ($Order->Offers as $OfferProduct)
            <tr>
                <td>{{ "عرض " .  $OfferProduct->Offer->Product->Name . " عدد " .$OfferProduct->Offer->Qty ." قطعه" }}</td>
                <td>{{$OfferProduct->Qty}}</td>
                <td>{{$OfferProduct->Total}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            اجمالي تكلفه الاوردر:  {{$Order->Total_Price}}
        </div>
        <div class="col">
            اجمالي عدد قطع الاوردر: {{$Order->Total_Qty}}
        </div>
    </div>
</div>
@endsection