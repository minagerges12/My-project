@extends('admin.layout')

@section('Title','لوحة التحكم')

@section('Style','master.css')

@section('Content')

<h2 class="my-5">
    <span class="float-end"> الموردين</span>
    <a href="{{route('Supplier.create')}}" class="btn btn-primary float-start">+</a>
</h2>  
<div class="clearfix"></div>
<table class="table table-striped mt-5">
    <thead>
    <tr>
        <th style="min-width: 150px">الاسم</th>
        <th>رقم التليفون</th>
        <th>العنوان</th>
        <th>البريد الالكتروني</th>
        <th style="min-width: 200px"> التفاصيل </th>
    </tr>
    </thead>
    <tbody>
        @foreach ($Suppliers as $Supplier)
            <tr>
                <td>{{$Supplier->Name}}</td>
                <td>{{$Supplier->Phone}}</td>
                <td>{{$Supplier->Address}}</td>
                <td>{{$Supplier->Email}}</td>
                <td>
                  <button class="btn btn-success text-light" type="button">
                    <a class="text-light text-decoration-none" href="{{route('Supplier.edit',$Supplier->id)}}">تعديل</a>
                  </button>
                  <form action="{{ route('Supplier.destroy',$Supplier->id) }}" method="POST" class="d-inline">
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