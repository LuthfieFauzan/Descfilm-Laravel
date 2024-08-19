@extends('Main')


@section('body')
<body id="page-top" style="background-color: #1f2833">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: darkred" id="mainNav">
			<div class="container">
				<a class="navbar-brand js-scroll-trigger" href="{{ route('Home') }}" style="color: white;">Descfilm</a>
		        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: firebrick; color: white;">
		            	<span class="navbar-toggler-icon my-toggler"></span>
					</button>
		            <div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto">

				    	<li class="nav-item">
				        	<a class="nav-link" href="{{ route('About') }}">About Us</a>
				        </li>
					</ul>
				</div>
			</div>
		</nav>
    	<br/><br/><br/>
        <div class="container" id="login">

            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center" style="background-color: darkred; color: white;">Login</div>
                @if (session()->has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
                <form action="{{ route('login.post') }}" method="post">
            @csrf
                <div class="card-body">
					<div class="form-group">
						<div class="form-group">
							Email
							<input class="form-control hide-border @error('email') is-invalid @enderror" name="email" type="email" id="email"
                             value="{{ old('email') }}"placeholder="Masukkan Email">

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
							<input class="form-control hide-border @error('password') is-invalid @enderror" type="password" name="password"
                            id="password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    </p>
                     <button class="btn btn-block btn-warning" style="color: white;" type="submit">Login</button>
                    <br/>
                     <a href="{{ route('Home') }}">
                     <button class="btn btn-block btn-danger" style="color: white;" value="cancel" >Cancel</button>
                     </a>
                </div>
            </div>
        </div>
    	</form>
        @isset($error)

        @endisset
    	<br/>
       <a href="{{ route('Regis') }}">
        <button class="btn btn-block" style="color: white;">Doesn't have an account?<br/>Register</button>
        </a>
        <br><br><br>

		<a id="scroll" style="display: none;"><span></span></a>

</body>
@endsection
