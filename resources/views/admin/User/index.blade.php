@extends('admin.layout')

@section('Title','لوحة التحكم')

@section('Style','master.css')

@section('Content')

<h2 class="my-5">
    <span class="float-end"> المستخدمين </span>
    <a href="{{route('User.create')}}" class="btn btn-primary float-start">+</a>
</h2>  
<div class="clearfix"></div>
<table class="table table-striped mt-5">
    <thead>
    <tr>
        <th scope="col">الاسم</th>
        <th scope="col">الصلاحيه</th>
        <th scope="col">تغيير الي </th>
        <th scope="col"> التفاصيل </th>
    </tr>
    </thead>
    <tbody>
        @foreach ($Users as $User)
            <tr>
                <td>{{$User->Fname}} {{$User->Lname}}</td>
                <td>{{$User->Role}}</td>
                @if ($User->Role == "User")
                    <td><a class="btn btn-success" href="/User/Change/{{$User->id}}">تعيين مسئول</a></td>
                @else
                    <td><a class="btn btn-success" href="/User/Change/{{$User->id}}">تعيين مستخدم</a></td>
                @endif
                <td>
                  <button class="btn btn-success text-light" type="button">
                    <a class="text-light text-decoration-none" href="{{route('User.edit',$User->id)}}">تعديل</a>
                  </button>
                  <form action="{{ route('User.destroy',$User->id) }}" method="POST" class="d-inline">
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