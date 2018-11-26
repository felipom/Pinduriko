<!doctype html>
<html>
    <head>
        @include('include.head')
        <style>
        .btn{
            color: white;
            background-color: #FF8C00;
            border-color: #FF8C00;
        }
        body{
            background-color: #4F4F4F; 
        }
        .navbar{
            background-color: #FF8C00;
        }
        .nav-link{
            color: white;
        }

        </style>
    </head>
    <body>
        
        @include('include.header')
        
        <br>
        <div class="container">
                @yield('content')
        </div>

        <footer class="page-footer font-small blue fixed-bottom">

        @include('include.footer')
        </footer> 
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('javascript')
    </body>
</html>
