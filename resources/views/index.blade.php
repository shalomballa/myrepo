<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="{{ url ('https://fonts.googleapis.com') }}">
	<link rel="preconnect" href="{{ url ('https://fonts.gstatic.com') }}" crossorigin>
	<link href="{{ url ('https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap') }}" rel="stylesheet">
	<!-- Font Awesome -->
  	<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  	<!-- Fonts and icons -->
	<script src="{{url('assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
	  WebFont.load({
	    google: {"families":["Lato:300,400,700,900"]},
	    custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
	    active: function() {
	      sessionStorage.fonts = true;
	    }
	  });
	</script>

	<link rel="stylesheet" href="{{ url ('fonts/icomoon/style.css') }}">
	<link rel="stylesheet" href="{{ url ('fonts/flaticon/font/flaticon.css') }}">

	<link rel="stylesheet" href="{{ url ('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css') }}">

	<link rel="stylesheet" href="{{ url ('css/tiny-slider.css') }}">
	<link rel="stylesheet" href="{{ url ('css/aos.css') }}">
	<link rel="stylesheet" href="{{ url ('css/glightbox.min.css') }}">
	<link rel="stylesheet" href="{{ url ('css/style.css') }}">

	<link rel="stylesheet" href="css/flatpickr.min.css">


	<title>API Social Media</title>
</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="index.html" class="logo m-0 float-start">API_social<span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center">
							<form action="#" class="search-form d-inline-block d-lg-none">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>

							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="{{ route('index') }}">Accueil</a></li>
								<li class="has-children">
									<a href="#">Pages</a>
									<ul class="dropdown">
										<li><a href="{{ route('post.create') }}">Créer un post</a></li>
										@if(Session()->has('user'))
											@if(Session('user')->user_type==1)
												<li><a href="{{ route('beat.create') }}">Créer un beat</a></li>
											@else
											@endif
										@endif
										{{-- <li class="has-children">
											<a href="#">Dropdown</a>
											<ul class="dropdown">
												<li><a href="#">Sub Menu One</a></li>
												<li><a href="#">Sub Menu Two</a></li>
												<li><a href="#">Sub Menu Three</a></li>
											</ul>
										</li> --}}
									</ul>
								</li>
								<li><a href="{{ route('login.index') }}">Se connecter</a></li>
								<li><a href="{{ route('signup.index') }}">S'inscrire</a></li>
								@if(Session('user'))
									<li class="has-children">
										<a href="#">{{Session('user')->name}}</a>
										<ul class="dropdown">
											<li><a href="{{ route('logout') }}">Se déconnecter</a></li>
										</ul>
									</li>
								@endif
							</ul>
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Tous les postes</h2>
				</div>
			</div>

			<div class="row">
				@foreach($posts as $post)
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="#" class="img-link"><img src="images/img_1_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							

							<h2><a href="single.html">{{ $post->content }}</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">{{ $post->User->name }}</a></span>
								<span>&nbsp;-&nbsp; {{ $post->created_at->format('d-m-y g:i A') }}</span>
							</div>
							<form method="post" action="{{ route('post.like', $post->id) }}">
								@csrf
								<p class="fas fa-heart" title="liker" alt="liker"></p>
								<button class="btn" type="submit">J'aime</button>
								@php
								$likes = 'App\Models\Likes'::where('likeable_type', '=', 1)->where('likeable_id', '=', $post->id)->count();
								@endphp
								<span id="likes">{{ $likes }}</span>
							</form>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			
		</div>
	</section>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Tous les beats</h2>
				</div>
			</div>

			<div class="row">
				@foreach($beats as $beat)
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="{{ $beat->free_file }}" class="img-link"><img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							
							

							<h2><a href="single.html">{{ $beat->title }}</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="images/person_5.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">admin</a></span>
								<span>&nbsp;-&nbsp; {{ $beat->created_at->format('d-m-y g:i A') }}</span>
							</div>
							<form method="post" action="{{ route('beat.like', $beat->id) }}">
								@csrf
								<p class="fas fa-heart" title="liker" alt="liker"></p>
								<button class="btn" type="submit">J'aime</button>
								@php
								$likes = 'App\Models\Likes'::where('likeable_type', '=', 2)->where('likeable_id', '=', $beat->id)->count();
								@endphp
								<span id="likes">{{ $likes }}</span>
							</form>
							<p></p>
							<p><a href="#" class="read-more"></a></p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			
		</div>
	</section>

	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Our pages</h3>
						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-facebook"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					<div class="widget">
						<h3 class="mb-4">Company</h3>
						<ul class="list-unstyled float-start links">
							<li><a href="#">About us</a></li>
						</ul>
						<ul class="list-unstyled float-start links">
							<li><a href="#">Partners</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed by <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
          </div>
        </div>
      </div> <!-- /.container -->
    </footer> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>

    <script src="js/flatpickr.min.js"></script>


    <script src="js/aos.js"></script>
    <script src="js/glightbox.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>

    <script src="{{asset('assets/js/sweetalert.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2.all.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2.js')}}"></script>
    <script src="{{asset('assets/js/mysweetalert.js')}}"></script>

	<script type="text/javascript" class="col-xl-10">


        function messageFash(title,texte,icon){

            Swal.fire({
                    title: title,
                    text: texte,
                    icon: icon,
                    toast: true,
                    width: 600,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                })
        }

        @if(Session('success'))
            messageFash("Opération réussie","{{Session('success')}}", "success");
        @endif

        @if(Session('error'))
            messageFash("Désolé","{{Session('error')}}", "error");
        @endif

        @if(Session('alert'))
            messageFash("Attention","{{Session('alert')}}", "alert");
        @endif

    </script>
    
  </body>
  </html>
