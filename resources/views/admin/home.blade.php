@extends('admin.layout')

@section('Title','لوحة التحكم')

@section('Style','master.css')

@section('Content')

<h2 class="my-3">الصفحة الرئيسية</h2>
<div class="row justify-content-center my-5">
    <div style="border-radius:5px;" class="col-3 p-3 flex-fill text-center pt-4 me-2 bg-primary text-white"> انظمة المراقبة: {{$Categories}}</div>
    <div style="border-radius:5px;" class="col-3 p-3 flex-fill text-center me-2 bg-success text-white"> العروض: {{$Offers}}</div>
    <div style="border-radius:5px;" class="col-3 p-3 flex-fill text-center me-2 bg-info text-dark"> المستخدمين : {{count($Users)}}</div>
</div>
<h2 class="my-5">
    <span class="float-end"> المستخدمين </span>
    <a href="{{ route('User.create') }}" class="btn btn-primary float-start">+</a>
</h2>  
<div class="clearfix"></div>
<table class="table table-striped mt-5">
    <thead>
    <tr>
        <th scope="col">الاسم</th>
        <th scope="col">الصلاحيه</th>
        <th scope="col">تغيير الي </th>
    </tr>
    </thead>
    <tbody>
        @foreach ($Users as $User)
            <tr>
                <td>{{$User->Fname}} {{$User->Lname}}</td>
                <td>{{$User->Role}}</td>
                @if ($User->Role == "User")
                    <td><a class="btn btn-success" href="/ChangeRole/{{$User->id}}">>تعيين مسئول</a></td>
                @else
                    <td><a class="btn btn-success" href="/ChangeRole/{{$User->id}}">تعيين مستخدم</a></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@endsection