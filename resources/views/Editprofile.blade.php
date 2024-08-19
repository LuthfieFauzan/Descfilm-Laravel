
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">
    <link href="{{ asset('img/movie.png') }}" rel="shortcut icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
<title id="title">Edit Profile</title>

</head>

<body id="page-top" style="background-color: #1f2833">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: darkred" id="mainNav">
			<div class="container">
				<a class="navbar-brand js-scroll-trigger" href="{{ route('Home') }}" style="color: white;">Descfilm</a>
		        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: firebrick; color: white;">
		            	<span class="navbar-toggler-icon my-toggler"></span>
					</button>
		            <div class="collapse navbar-collapse" id="navbarResponsive">
				</div>
			</div>
		</nav>
    	<br/><br/><br/>
        <form action="{{ route('updateprofil') }}" enctype="multipart/form-data"  method="POST">
    	@csrf
            <div class="container" id="regist">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center" style="background-color: darkred; color: white;">Edit my profile</div>
                <div class="card-body">

					<input name="uid" type="hidden" value="{{ $user->id }}">
                    <div class="form-group">
                    	<div class="form-group">
                    		Username

							<input  value="{{ old('name') ?? $user->username }}" id="name" name="name" class="form-control @error('email') is-invalid @enderror" label="name"/>
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
                                    @if ($user->gender =='Female')
                                    selected
                                    @endif
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
								<input type="date" name="DOB" value="{{ $user->date_of_birth }}" placeholder="YYYY/MM/DD" class="form-control" required  min="1900-01-01" max="{{date("Y-m-d")}}">
							</div>
                    </div>
                    	<div class="form-group">
                    		Description
		                        <textarea id="description" name="description" class="form-control"   placeholder="Your description" rows="2">{!! $user->desc !!}</textarea>

                        </div>
                        <div class="form-group">
                    	<label for="files">Profile Image</label>
		                    	<input type="file" id="files" accept="image/*"  name="files"  class="form-control">
                        </div>
                    <input type="submit" value="Confirm" class="btn btn-block btn-info" style="color: white;">
                    <br/>
                     <a href="{{ route('Profil',Auth::user()->slug) }}">
                     <button class="btn btn-block btn-danger" style="color: white;" type="button" value="cancel" >Cancel</button>
                     </a>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <br><br><br>
		@include('partials.Footer')
        @include('partials.script')

</body>
</html>
