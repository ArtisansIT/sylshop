<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.min.css') }}">
    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/bundles/prism/prism.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/bundles/prism/prism.css') }}"> --}}
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('admin/assets/img/favicon.ico') }}' />

    @section('header')

    @show

    @livewireStyles

    @livewireScripts

</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @if (auth()->check() && auth()->user()->role_id == 1)
                
            @include('admin/partials/headerForUserNotAdmin')
            @else
                
            @include('admin/partials/header')
            @endif




            <!-- Main Content -->
            <div class="main-content">
                {{-- <section class="section">
          <div class="section-body"> --}}
                @yield('mainContent')


            </div>



            @include('admin/partials/footer')




        </div>
    </div>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <!-- General JS Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>


    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/index.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>

    <!-- Custom JS File -->
    


    
    
    @stack('scripts')
</body>


</html>
