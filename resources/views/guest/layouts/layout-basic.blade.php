<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap core CSS-->
	<link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Custom fonts for this template-->
	<link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="{{asset('admin/css/sb-admin.css')}}" rel="stylesheet">

	<!--formulario inicial-->
	<link rel="stylesheet" href="{{asset('css/formulario-inicial.css')}}">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

		<!--Google captcha-->
		<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
		</script>

</head>

<body id="page-top">
	<div id="app">

		@include('guest.includes.navbar')
		
		@if(session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Feito!</strong> {{session('success')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		
		@if ($errors->any())
			<div class="alert alert-danger alert-dismissible">
				<ul>
					@foreach ($errors->all() as $error)
						<li><strong>Atenção </strong>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		

		@yield('content')


	</div>
	<script type="text/javascript" src="{{asset('js/libs/jquery-1.9.1.js')}}"></script>
	<script src="{{asset('js/mask/jquery-mask.js')}}"></script>

	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
	async defer>
	document.getElementById("buttonSubmit").disabled = true;
</script>

	<script src="{{asset('js/mask/mymasks.js')}}"></script>

</body>

</html>