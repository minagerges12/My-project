@extends('layouts.Category')

@section('Title','طلب اوردر')

@section('Style','page5.css')
@section('Content')
<div class="form" style="padding-top: 100px;">
    <div class="content" style="width: 500px; margin: 50px auto; background-color: #A59888;padding: 20px;border-radius: 10px">
        <form action="{{ route('saveorder') }}" method="post">    
            @csrf
            <div class="row mt-3">
                <h4>المعلومات الشخصيه</h4>
                <div class="col">
                    <input class="form-control mt-2" disabled value="{{ Auth::user()->Fname}}{{ Auth::user()->Lname}}" type="text" name="Name" />
                </div>
                <div class="col">
                    <input class="form-control mt-2" type="text" disabled value="{{Auth::user()->Phone}}" name="Phone" />
                </div>
            </div>
            
            <input class="form-control mt-2" type="email" disabled value="{{Auth::user()->email}}" name="Email" />
            <input class="form-control mt-2" type="text" name="Address" placeholder="العنوان" required />
            <div class="gender-details">
            <h4 >طريقة الدفع</h4>
            <div class="category">
            <button><input type="radio" name="Pay" value="cash" checked> كاش </input></button>
<button onclick="myFunction()"> <input type="radio" name="Pay" value="visa">فيزا</input>
</button>
</div>
<div id="row"style="display: none;">
<input type="text" class="form-control mt-4" placeholder="card number 1111-2222-3333-4444 " minlength="16"
    maxlength="16">
<input type="text" class="form-control mt-2" placeholder="card cvc  632" minlength="3" maxlength="3" >
<input type="text" class="form-control mt-2" placeholder="exp year" minlength="4" maxlength="4" >
</div>
<script>
function myFunction() {
    var x = document.getElementById("row");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
     <div class="row mt-3">
                <div class="col">
                    <label>السعر الكلي</label>
                    <input type="number" class="form-control mt-2" disabled value="{{ session('Cart')->TotalPrice }}">
                </div>
                <div class="col">
                    <label>عدد العناصر</label>
                    <input type="number" class="form-control mt-2" disabled value="{{session('Cart')->TotalQty}}">
                </div>
            </div>
            <button class="btn btn-success mt-4 w-75 me-5" type="submit">شراء الان</button>
        </form>
    </div>
</div>
@endsection