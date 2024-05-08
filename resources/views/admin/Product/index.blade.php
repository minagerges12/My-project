@extends('admin.layout')

@section('Title','لوحة التحكم')

@section('Style','master.css')

@section('Content')

<h2 class="my-5">
    <span class="float-end"> المنتجات </span>
    <a href="{{route('Product.create')}}" class="btn btn-primary float-start">+</a>
</h2>  
<div class="clearfix"></div>
<table class="table table-striped mt-5">
    <thead>
    <tr>
        <th style="min-width: 150px">الاسم</th>
        <th>الصوره</th>
        <th>الوصف</th>
        <th>الموديل</th>
        <th>اللون</th>
        <th>الكميه</th>
        <th>السعر</th>
        <th style="min-width: 200px"> التفاصيل </th>
    </tr>
    </thead>
    <tbody>
        @foreach ($Products as $Product)
            <tr>
                <td>{{$Product->Name}}</td>
                <td><img  width="150px" height="80px" src="/images/{{$Product->Image}}" /></td>
                <td>{{$Product->Description}}</td>
                <td>{{$Product->Model}}</td>
                <td>{{$Product->Color}}</td>
                <td>{{$Product->Qty}}</td>
                <td>{{$Product->Price}}</td>
                <td>
                  <button class="btn btn-success text-light" type="button">
                    <a class="text-light text-decoration-none" href="{{route('Product.edit',$Product->id)}}">تعديل</a>
                  </button>
                  <form action="{{ route('Product.destroy',$Product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">حذف</button>
                  </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection