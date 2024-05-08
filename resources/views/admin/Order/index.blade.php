@extends('admin.layout')

@section('Title','لوحة التحكم')

@section('Style','master.css')

@section('Content')

<h2 class="my-5">
    <span class="float-end"> طلبات العملاء </span>
    {{-- <a href="{{route('Category.create')}}" class="btn btn-primary float-start">+</a> --}}
</h2>  
<div class="clearfix"></div>
<table class="table table-striped mt-5">
    <thead>
    <tr>
        <th style="min-width: 150px">الاسم العميل</th>
        <th>رقم التليفون</th>
        <th>العنوان</th>
        <th> اجمالي الاوردر </th>
        <th> عدد القطع </th>
        <th style="min-width: 200px">تاريخ الشراء </th>
        <th style="min-width: 200px"> التفاصيل </th>
    </tr>
    </thead>
    <tbody>
        @foreach ($Orders as $Order)
            <tr>
                <td>{{$Order->User->Fname . " " . $Order->User->Lname}}</td>
                <td>{{$Order->User->Phone}}</td>
                <td>{{$Order->Address}}</td>
                <td>{{$Order->Total_Price}}</td>
                <td>{{$Order->Total_Qty}}</td>
                <td>{{$Order->created_at}}</td>
                <td>
                  <button class="btn btn-success text-light" type="button">
                    <a class="text-light text-decoration-none" href="{{route('Order.show',$Order->id)}}">تفاصيل</a>
                  </button>
                  <form action="{{ route('Order.destroy',$Order->id) }}" method="POST" class="d-inline">
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