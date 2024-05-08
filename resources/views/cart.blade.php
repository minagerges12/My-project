@extends('layouts.Category')

@section('Title','سله المشتريات')

@section('Style','test1.css')

@section('Content')
<div class="service">
    <h3 class="main-title">سله المشتريات</h3>
    <div class="container-fluid">
        @if(isset($Cart))
            <div class="border-primary bg-white" style="padding: 10px 20px;border-radius: 10px">
                <h3>سله المشتريات</h3>
                <hr>
                <div class="container-fluid" style="overflow-x: scroll">
                    <table class="table table-bordered" style="margin-top: 10px;">
                        <tr>
                            <th>رقم المنتج</th>
                            <th> اسم المنتج او العرض </th>
                            <th>عدد القطع</th>
                            <th style="text-align: right;">السعر الكلي</th>
                            <th>حذف المنتج</th>
                        </tr>
                        @foreach($Cart->Items as $Item)
                            <tr>
                                <td>{{$Item['Item']['id']}}</td>
                                <td>{{$Item['Item']['Name']}}</td>
                                <td>{{$Item['Qty']}}</td>
                                <td style="direction: rtl;text-align: right;padding-right: 30px">{{$Item['Price']}}<strong style="margin-left: 5px">{{" جنيه "}}</strong></td>
                                <td>
                                    <a class="btn btn-danger" href="{{route('RemoveFromCart',$Item['Item']['id'])}}">حذف</a>
                                </td>
                            </tr>
                        @endforeach
                        @foreach($Cart->OffersItems as $Item)
                            <tr>
                                <td>{{ $Item['Item']->Product->id }}</td>
                                <td> عرض {{$Item['Item']->Product->Name}} عدد {{ $Item['Item']->Qty }} قطعه </td>
                                <td>{{$Item['Qty']}}</td>
                                <td style="direction: rtl;text-align: right;padding-right: 30px">{{$Item['Price']}}<strong style="margin-left: 5px">{{" جنيه "}}</strong></td>
                                <td>
                                    <a class="btn btn-danger" href="{{route('RemoveOfferFromCart' , $Item['Item']->Product->id)}}">حذف</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <hr>
                <div class="container-fluid clearfix">
                    <br>
                    <p class="float-left card-text tex" style="font-style: italic">
                        {{"عدد القطع الكلي :  "}}<strong style="margin-left: 5px">{{$Cart->TotalQty}}</strong>
                        <br>
                        <br>
                        {{"السعر الكلي :"}}<strong style="margin-left: 5px">{{$Cart->TotalPrice}}{{" جنيه "}}</strong>
                        <br>
                    </p>
                    <a href="{{route('showcheckout')}}" class="float-right btn btn-success" style="text-align: center; margin-top: 20px">شراء</a>
                </div>
                <hr>
            </div>
        @else
            <div class="container-fluid text-center" style="margin-top: 10%;font-size: 20px; font-weight: bold;font-style: italic;margin-bottom: 20%;">
                السله فارغه
            </div>
        @endif
    </div>
</div>
@endsection
