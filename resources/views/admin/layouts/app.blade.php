<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Presser') }}</title>

	<!-- Scripts -->
	<script src="{{ mix('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600&display=swap">

	<!-- Styles -->
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="app" class="d-flex w-100">
	<nav id="menubar" class="navbar navbar-expand-sm navbar-dark fixed-top justify-content-end">
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user"></i>&nbsp;
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
		</ul>
	</nav>
	<nav id="sidebar" class="navbar">
		<div class="sidebar-header mt-5">
			<h3>{{ config('app.name', 'Presser') }}</h3>
		</div>
		<ul class="navbar-nav list-unstyled components">
			{{-- Todo: Remove space between icon and text--}}
			<li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>
			</li>
			<li class="nav-item"><a class="nav-link" href="{{ url('admin/posts') }}"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;Posts</a></li>
			<li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-photo-video"></i>&nbsp;&nbsp;Media</a>
			</li>
			<li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user"></i>&nbsp;&nbsp;Users</a></li>
		</ul>
	</nav>
	<main>
		@yield('content')
	</main>
</div>

</body>
</html>
