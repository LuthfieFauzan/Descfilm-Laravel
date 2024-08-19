
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">
        <link href="{{ asset('img/movie.png') }}" rel="shortcut icon"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Zone | Descfilm</title>
    </head>
    <body onload="loads()" id="page-top" style="background-color: #1f2833" ng-app="validationApp" ng-controller="mainController">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: darkred" id="mainNav">
            <div class="container">
	            <a href="{{ route('Home') }}" class="navbar-brand" style="color: white">Descfilm</a>
	            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: firebrick; color: white;">
	            	<span class="navbar-toggler-icon my-toggler"></span>
				</button>

            </div>
        </nav>
        <br/><br/><br/><br/><br/><br/>

        	<div class="container" id="logen">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center" style="background-color: darkred; color: white;">Login Admin</div>
                <div class="card-body">
					<form action="{{ route('loginadmin') }}" method="post">
                        @csrf
					<div class="form-group">
						<div class="form-group">
							Email
							<input value="{{ old('email') }}" id="email" name="email" class="form-control @error('email') is-invalid @enderror" label="email" type="email" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                    	<div class="form-group">
                    		Password
							<input id="password" name="password" class="form-control @error('password') is-invalid @enderror" label="password"  type="password" redisplay="true"/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block btn-warning" style="color: white;" value="Login"  />
					</form>
                   </div>
            </div>
        </div>

    </body>
</html>
