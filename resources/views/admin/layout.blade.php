<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('Title')</title>
        
        <link rel="stylesheet" href="/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/css/@yield('Style')">
        <link rel="stylesheet" href="/css/framework.css" />
        <link rel="stylesheet" href="/css/all.main.css" />
        <link rel="preconnect" href="https://fonts.googlepis.com">
        <link rel="preconnect" href="https:fonts.gstatic.com" crossorigin="">
        <link rel="https://fonts.googleapis.com/css2?family=cairo:wght@400;700&display=swap" rel="stylesheet">
    
    </head>

<body style="direction: rtl">
    <div class="page d-flex">
        <div class="sidebar bg-white p-20 p-relative">
            
            <h4 class="p-relative txt-c mt-0">
                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-center fs-14 c-black  red-6 p-10" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa-solid fa-user ms-2"></i>
                    <span>{{ Auth::user()->Fname ." ". Auth::user()->Lname}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span> تسجيل خروج </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </h4>
            <hr>
            <ul>
                <li>
                    <a class=" d-flex align-center fs-14 c-black  red-6 p-10" href="/home">
                        <i class="fa-solid fa-house fa-fw "></i>
                        <span>الصفحة الرئيسية</span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-center fs-14 c-black  red-6 p-10" href="{{route('User.index')}}">
                        <i class="fa-solid fa-user fa-fw "></i>
                        <span> المستخدمين </span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-center fs-14 c-black  red-6 p-10" href="{{route('Product.index')}}">
                        <i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>
                        <span> المنتجات </span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-center fs-14 c-black  red-6 p-10" href="{{route('Category.index')}}">
                        <i class="fa-solid fa-cubes"></i>
                        <span> الفئات </span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-center fs-14 c-black  red-6 p-10" href="{{route('Offer.index')}}">
                        <i class="fa-solid fa-scale-unbalanced"></i>
                        <span> العروض </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black  red-6 p-10" href="{{route('Supplier.index')}}">
                        <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                        <span> الموردين </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black  red-6 p-10" href="{{route('Order.index')}}">
                        <i class="fa-solid fa-microphone"></i>
                        <span> المبيعات </span>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="content overflow-hidden px-3" style="width: 100%">
            @yield('Content')
        </div>
    </div>
    <script src="/js/jquery.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>