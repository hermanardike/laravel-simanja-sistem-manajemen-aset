<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.7.2/css/all.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
    @vite('resources/css/app.css')

{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">--}}



    @stack('customCss')
    @stack('css-tab')
    @stack('custom-owl')
    @stack('css-datatable')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tab/tab-host.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tab/tab-instance.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tab/tab-srv.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.min.css')}}">
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
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>--}}
<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js')}}"></script>
<script src="{{asset('assets/js/stisla.js')}}"></script>



<!-- JS Libraies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
@stack('customchartjs')
<script src="{{asset('assets/js/lightbox.js')}}"></script>
@stack('customJS')
@stack('js-owl')
@stack('devicesauth')
@stack('js-datatable')
<!-- Template JS File -->
<script src="https://kit.fontawesome.com/0fec2dd060.js" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Belum Digunakan',
                'Aktif',
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [50, 50,],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
                hoverOffset: 4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
