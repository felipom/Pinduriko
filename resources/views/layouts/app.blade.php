<!doctype html>
<html>
    <head>
        @include('include.head')
        <style>
        .btn{
            color: black;
            background-color: #A4D3EE;
            border-color: #A4D3EE;
        }
        body{
            background-color: #4F4F4F; 
        }
        .navbar{
            background-color: #A4D3EE;
        }
        .nav-link{
            color: black;
        }
        .h7{
            color: black;
        }

.page-footer{
    background-color: #A4D3EE; 
}


        .as:link {
   color: #A4D3EE;
}

/* link que foi visitado */
.as:visited {
    color: #A4D3EE;
}

/* mouse over */
.as:hover {
    color: black;
}

/* link selecionado */
.as:active {
    color: black;
}





/* link que foi visitado */
.ab:visited {
    color: black;
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
