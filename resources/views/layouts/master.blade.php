<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes.head')
	<style>
		.btn-xs {
			height: auto !important;
		}

		.help-block {
			font-size: 12px !important;
		}

		tr > td {
			font-size: 12px !important;
		}

		.label {
			font-size: 11px !important;
		}
	</style>
	@yield('title')
	@yield('link')
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
	<!--============= start main area -->

	<!-- APP NAVBAR ==========-->
	@include('includes.navbar')
	<!--========== END app navbar -->

	<!-- APP ASIDE ==========-->
	@include('includes.sidebar')
	<!--========== END app aside -->

	<!-- navbar search -->
	@include('includes.search')
	<!-- .navbar-search -->

	<!-- APP MAIN ==========-->
	<main id="app-main" class="app-main">
		<div class="wrap">
			<section class="app-content">
				<div class="row">
						
						@include('includes.editprofile')
						@include('includes.editpassword')
                        @include('includes.alert')
                        
						@yield('alert-error')
						@yield('content')
					
			</section><!-- .app-content -->
		</div><!-- .wrap -->

		@yield('modal')
		
		<!-- APP FOOTER -->
		@include('includes.footer')
		<!-- /#app-footer -->
	</main>
	<!--========== END app main -->

	<script>
		var LIB_URL = "{{ asset('theme') }}"
	</script>

	{{-- @include('backend.includes.customizer') --}}

	@include('includes.script')

	@yield('footscript')
</body>

</html>