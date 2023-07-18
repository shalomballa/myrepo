<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>API_social | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.min.css')}}">

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

  <style type="text/css">
    body{
      background-image: url(bg-abstract2.png);
    }
  </style>

</head>
<body class="hold-transition login-page">
<a href="{{ route('index') }}">retour à l'accueil</a>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="" class="h1">Connexion</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"></p>

      <form method="post" action="{{ action('App\Http\Controllers\LoginController@login') }}">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block">S'inscrire</button>
          </div>
          <a href="{{ route('signup.index') }}">Pas de compte ?</a>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

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
