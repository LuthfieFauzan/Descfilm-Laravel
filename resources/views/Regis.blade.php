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
        <form action="{{ route('Regis.post') }}"   method="post">
            @csrf
    	<div class="container" id="regist">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center" style="background-color: darkred; color: white;">Register</div>
                <div class="card-body">
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
                    		Username
							<input  value="{{ old('name') }}" id="name" name="name" class="form-control @error('email') is-invalid @enderror" label="name"/>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 mb-3">
		                    	<label for="gender">Gender</label>
								<select class="custom-select d-block w-100" id="gender" name="gender" class="form-control" required>
	                                <option value="Male">Male</option>
	                                <option value="Female"
                                     @if (old('gender')== 'Female')
                                        selected
                                    @endif>Female</option>
	                            </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
							</div>
					<div class="col-md-6 mb-3">
		                    	<label for="DOB">Date of birth</label>
								<input type="date" value="{{ old('DOB') }}" name="DOB" id="DOB" placeholder="YYYY/MM/DD" min="1980-01-01" max="{{date("Y-m-d")}}" class="form-control @error('DOB') is-invalid @enderror">
                                @error('DOB')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                    </div>
                    	<div class="form-group">
                    		Password
							<input id="password" name="password" class="form-control @error('password') is-invalid @enderror" label="password"  type="password" redisplay="true"/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                    		Confirm password
							<input id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" label="cpass"  type="password" redisplay="true"/>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-block btn-info" style="color: white;">Register</button>
                    </div>

                </div>
            </div>
        </div>
        </form>
        <br/>
        <a href="{{ route('Login') }}">
        <button class="btn btn-block" style="color: white;">Already have account?</button>
        </a>
        <br><br><br>
		<a id="scroll" style="display: none;"><span></span></a>
</body>
@endsection
