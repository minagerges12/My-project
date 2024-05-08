@extends('admin.layout')

@section('Title','لوحة التحكم')

@section('Style','master.css')

@section('Content')

<h2 class="my-5">
    <span class="float-end"> العروض </span>
    <a href="{{route('Offer.create')}}" class="btn btn-primary float-start">+</a>
</h2>  
<div class="clearfix"></div>
<table class="table table-striped mt-5">
    <thead>
    <tr>
        <th style="min-width: 150px">الاسم</th>
        <th>الصوره</th>
        <th>الوصف</th>
        <th style="min-width: 200px"> التفاصيل </th>
    </tr>
    </thead>
    <tbody>
        @foreach ($Offers as $Offer)
            <tr>
                <td>{{$Offer->Product->Name}} : {{$Offer->Qty}} قطعه</td>
                <td><img  height="80px" width="150" src="/images/{{$Offer->Image}}" /></td>
                <td>{{$Offer->Description}}</td>
                <td>
                  <button class="btn btn-success text-light" type="button">
                    <a class="text-light text-decoration-none" href="{{route('Offer.edit',$Offer->id)}}">تعديل</a>
                  </button>
                  <form action="{{ route('Offer.destroy',$Offer->id) }}" method="POST" class="d-inline">
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