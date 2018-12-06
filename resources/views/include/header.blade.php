	<nav class="navbar navbar-expand-lg">

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link ab" href="/home"><i class="fas fa-home"></i>Pinduriko<span class="sr-only">(current)</span></a>
			</li>
			
			
			<li class="nav-item">
				<a class="nav-link ab" href="/produtos" id="help" aria-haspopup="true" aria-expanded="false">Listar Notas Fiscais</a>
			</li>
			<li class="nav-item">
				<a class="nav-link ab" href="/produtos/create" id="help" aria-haspopup="true" aria-expanded="false">Criar Nota Fiscal</a>
			</li>
		</ul>

		<!-- Right Side Of Navbar -->
		<ul class="navbar-nav ml-auto right">
			<!-- Authentication Links -->
			@guest
			<li><a class="nav-link ab" href="{{ route('login') }}">{{ __('Login') }}</a></li>
			<li><a class="nav-link ab" href="{{ route('register') }}">{{ __('Cadastro') }}</a></li>
			@else
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>

				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item ab" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
		@endguest
		</ul>
	</div>
</nav>

<script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="{% static 'js/bootstrap.min.js' %}"></script>
    <script src="{% static 'js/jquery.cookie.js' %}"></script>
    <script src="{% static 'js/lightbox.min.js' %}"></script>
    <script src="{% static 'js/front.js' %}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124689317-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-124689317-1');
    </script>