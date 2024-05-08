@extends('layouts.Category')

@section('Title')
    {{$Category->Name}}
@endsection

@section('Style','test.css')

@section('Content')
<div class="service">
    <h3 class="main-title">{{$Category->Name}}</h3>
    <div class="container">
        @foreach ($Category->Products as $Product)
            <div class="box">
                <img src="/images/{{$Product->Image}}" alt="">
                <div class="content">
                    <h3>{{$Product->Name}}</h3>
                    <p>{{$Product->Description}}</p>
                    <p>الموديل : {{$Product->Model}}</p>
                    <p>اللون:{{$Product->Color}}</p>
                    <div class="info">
                        <p>{{$Product->Price}} جنية</p>
                    </div>
                    <a href="{{route('AddToCart' , $Product->id)}}" class="btn btn-success" style="margin-right: 31%;"> اضف الي السله <span class="fas fa-cart-plus"></span></a>
                </div>
            </div>   
        @endforeach
    </div>
</div>
@endsection