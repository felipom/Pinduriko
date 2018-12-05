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
        .h7{
            color: white;
        }

.page-footer{
    background-color: #FF8C00; 
}


        .as:link {
   color: #FF8C00;
}

/* link que foi visitado */
.as:visited {
    color: #FF8C00;
}

/* mouse over */
.as:hover {
    color: white;
}

/* link selecionado */
.as:active {
    color: white;
}





/* link que foi visitado */
.ab:visited {
    color: white;
}

/* mouse over */
.ab:hover {
    color: black;
}

/* link selecionado */
.ab:active {
    color: black;
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
