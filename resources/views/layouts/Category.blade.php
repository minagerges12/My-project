<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('Title')</title>
        
        <link rel="stylesheet" href="/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/css/all.min.css">
        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/@yield('Style')">
        
        <link rel="preconnect" href="https://fonts.googlepis.com">
        <link rel="preconnect" href="https:fonts.gstatic.com" crossorigin="">
        <link rel="https://fonts.googleapis.com/css2?family=cairo:wght@400;700&display=swap" rel="stylesheet">
    </head>

<body style="direction: rtl">
    <header>
        <div class="container" style="max-width: 100% !Important">
            <a href=http://localhost:8000 class="logo">انذار</a>
            <nav>
                <i class="fas fa-bars toggle-menu"></i>
                <ul>
                    <li><a href="/" style="padding: 25px !important">الصفحة الرئيسية</a></li>
                    <li><a href="/#انظمة%20المراقبة" style="padding: 25px !important"> انظمة المراقبة</a></li>
                    <li><a href="/#العروض%20والخصومات" style="padding: 25px !important">العروض والخصومات</a></li>
                    <li><a href="/Staff" style="padding: 25px !important">تركيب الانظمة</a></li>
                    <li><a href="#من نحن" style="padding: 25px !important">من نحن</a></li>
                    <li><a href="/cart" style="padding: 25px !important"><i class="fa-solid fa-cart-arrow-down"></i></a></li>
                    @if (Route::has('login'))
                        @auth
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                تسجيل خروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @else
                            <li><a href="{{ route('login') }}">تسجيل دخول </a></li>
    
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">انشئ الحساب</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>
    </header>
            
    @yield('Content')

 
    <div class="footer" id="من نحن">
            <div class="container">
                <div class="col">
                    <h2>من نحن </h2>
                    <p>موقع انذار لخدمات انظمة المراقبة</p>
                    <p>مع نطور التكنولوجيا اصبح هذا النظام
                        امرا الاغني عنة لوامجهة المشاكل
                    </p>
                    <p>والاحداث التي يتعرض لهاالكثير من اصحاب الاملاك والشركات من عمليات السرقة </p>
                </div>
                <div class="col">
                    <h2>المميزات</h2>
                    <p>تقديم عروض وخصومات عند شراء اكثر من عرض </p>
                    <p>تقديم النوع من انظمة المراقبة والانذار </p>
                    <p>تقديم النوع مناسية من انظمة الكامرات والانذار للمستخدم </p>
                    <p>معرفة الاشخاص للانواع واسعار وانظمة المراقبة </p>
                </div>
                <div class="col">
                    <h2>العنوان </h2>
                    <p>15 ش طلعت حرب / وسط البلد / القاهرة</p>
                    <p> ارقام التليفون :</p>
                    <p>01134535870 </p>
                    <p> 01132657290</p>
                </div>
            </div>
        </div>
</body>

</html> 