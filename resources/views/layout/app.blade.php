<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.7.2/css/all.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Libraries -->
    @stack('customCss')
    @stack('custom-owl')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <style>
        .tab1 {
            display: inline-block;
            margin-left: 63px;
        }

        .tab2 {
            display: inline-block;
            margin-left: 75px;
        }
        .tab3 {
            display: inline-block;
            margin-left: 65px;
        }
        .tab4 {
            display: inline-block;
            margin-left: 100px;
        }
        .tab5 {
            display: inline-block;
            margin-left: 100px;
        }
        .tab6 {
            display: inline-block;
            margin-left: 25px;
        }
        .tab7 {
            display: inline-block;
            margin-left: 60px;
        }
        .tab8 {
            display: inline-block;
            margin-left: 50px;
        }
        .tab9 {
            display: inline-block;
            margin-left: 35px;
        }
        .tab10 {
            display: inline-block;
            margin-left: 50px;
        }
        .tab11 {
            display: inline-block;
            margin-left: 50px;
        }

    </style>

</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <!-- NavBarr -->
        @include('layout.navbar')
        <!-- Sidebar -->
        @include('layout.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        @include('layout.footer')
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js')}}"></script>
<script src="{{asset('assets/js/stisla.js')}}"></script>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<!-- JS Libraies -->
@stack('customJS')
@stack('js-owl')
<!-- Template JS File -->
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>


</body>
</html>
