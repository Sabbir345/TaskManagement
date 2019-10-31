<!doctype html>
<html lang="en">
    <head>
        <title>Task Application</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">
        <!-- Bootstrap core CSS -->
        <!-- <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
       <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
       <style type="text/css">
         img{
          width: 134px !important;
         }
       </style>

    </head>

    </br></br>
    <div class="w3-panel w3-card col-md-6 offset-md-3">
      </br>
        <div class="col-sm-8 offset-sm-2">
                <div class="text-center logo-padding">
                  <img src=" {{ asset('img/logo.png') }}" >
                   <h3 class="text-center">Admin Log In</h3>
                </div>
                
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
               
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                {{ csrf_field() }}
               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                   <label for="email">Email</label>

                   <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                   @if ($errors->has('email'))
                       <span class="help-block">
                           <strong>{{ $errors->first('email') }}</strong>
                       </span>
                   @endif

               </div>

               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                   <label for="password">Password
                   </label>
                   <input id="password" type="password" class="form-control" name="password" required data-eye>
                   @if ($errors->has('password'))
                       <span class="help-block">
                           <strong style="color: red;">{{ $errors->first('password') }}</strong>
                       </span>
                   @endif
               </div>

               <div class="form-group no-margin">
                   <button class="btn btn-primary btn-md btn-block"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
               </div>
               </form>
            </div>
            </br>
          </div>
      </br></br>

     <footer class="pt-md-3 border-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md">                      
                        <small class="d-block mb-3 text-center">Online Task Application 2019 &copy; copyright</small>
                    </div>                    
                </div>
            </div>
    </footer>
    </body>
</html>