<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">
    <link href="{{ asset('img/movie.png') }}" rel="shortcut icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>My profile | Descfilm</title>
</head>
<body id="page-top" style="background-color: #1f2833"
	onload="prefent()">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: darkred" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{ route('Home') }}" style="color: white;">Descfilm</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: firebrick; color: white;">
                    <span class="navbar-toggler-icon my-toggler"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('Changepass') }}">Change password</a>
                    </li> --}}
                    @auth
                    @if (Auth::user()->slug==$data->slug)

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Editprofile') }}">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button style="border:0px solid black; background-color: transparent;" class="nav-link" type="submit">Logout  <i class="fa fa-sign-out" aria-hidden="true"></i></button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('About') }}">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="" data-toggle="dropdown">{{ Auth::user()->username }}  <i class="fa fa-user" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu multi-column columns-3" style="background: darkred">
                            <li>
                                <div>
                                    <ul style="list-style-type: none; padding: 0px;">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('Profil',Auth::user()->slug) }}">My Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button style="border:0px solid black; background-color: transparent;" class="nav-link" type="submit">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('About') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Login') }}">Login</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>



	<br/><br/><br/><br/><br/>

	<section class="bg-transparent text-light p-3">
        <div class="container">
            <div class="">
                <div class="d-flex justify-content-center">
                    <img width="200px" height="200px" style="object-fit: cover" class="img rounded-circle" src="@if (preg_match('/http/i', $data->img))
                        {{ $data->img }}@else{{ asset('storage/' . $review->akun->img)}}
                        @endif" onerror="this.onerror=null; this.src='{{ asset('img/profile.png') }}'" alt="upload image" class="img-thumbnail">
                </div>
                <div class="">

                    <p class="mb-0 d-flex justify-content-center border border-primary">
                    {{ $data->title }}
                    </p>
                    <p class="lead mb-0">
                        {{ $data->username }}
                    </p>
                    <p class="lead mb-0">
                        EXP :
                    </p>
                    <div class="progress mb-3">

					    <div  class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="{{ $data->Exp }}" aria-valuemin="0" aria-valuemax="1000" style="color: black;width:{{ $data->Exp * 100/1000}}">
                            {{ $data->Exp }}/1000
					    </div>
					</div>
                    <div class="bg-light text-dark p-2 mb-10 rounded" style="min-height: 10em;">
                        <div class="row">
	                    	<div class="col-1">
			               		<p class="small">
			               			Gender
			               		</p>
	                    	</div>
	                    	<div class="col-1">
			               		<p class="small">
			               			:
			               		</p>
	                    	</div>
	                    	<div class="col-3">
	                    		<p class="small text-muted">
	                    			{{ $data->gender }}
	                    		</p>
	                    	</div>
	                    	<div class="col-3">
			               		<p class="small">
			               			Date of Birth
			               		</p>
	                    	</div>
	                    	<div class="col-1">
			               		<p class="small">
			               			:
			               		</p>
	                    	</div>
	                    	<div class="col-3">
	                    		<p class="small text-muted">
	                    			{{ $data->date_of_birth }}
	                    		</p>
	                    	</div>
	                    </div>
	                    <p>
                        My Description:
                         </p>
                        <p class="ml-1">
                            {!! $data->desc !!}
                         </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="myfav">
	        <div class="container">

                <div class="container text-center">
                    <h1 style="color: white">My Favorite <i class="fa fa-heart"></i></h1>
                </div>
	            <div class="row d-flex justify-content-center">
                    @forelse ( $favs as $fav)
                    <div class="col-md-4 mb-4 box-item" >
                    <a class="box-link" data-toggle="modal" href="#portfolio1Modal{{ $fav->film->id }}">
                        <div class="box-hover">
                            <div class="portfolio-hover-content">
                                <p style="text-align: center; color: white"> {{ $fav->film->scores }} <i class="fa fa-star" aria-hidden="true"></i> </p>
                            </div>
                        </div>
                        <img class="img-fluid" src="{{ asset('storage/' . $fav->film->img) }}"  onerror="this.onerror=null; this.src='{{ asset('img/cover.jpg') }}'"width="640px" height="426px" style="object-fit: cover">
                    </a>
                    <div class="portfolio-caption">
                        <h4 style="text-align: center; color: white">{{ $fav->film->title }}</h4>
                        <p style="text-align: center; color: white"> {{ $fav->film->genre }} </p>
                    </div>
                </div>

                    @empty
                    <div class="container text-center">
                        <p class="lead text-center" style="color: white">Add your favorite movie to tell other people what movie that you like and watch</p>
                    </div>

                    @endforelse
	            </div>
			</div>
		</section>
        @forelse ( $favs as $fav)

        <div class="modal fade" id="portfolio1Modal{{ $fav->film->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-uppercase">{{ $fav->film->title }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="video-container">
                        <iframe width="853" height="480" src="{{ $fav->film->videourl }}" frameborder="0" donotallowfullscreen></iframe>
                    </div>
                    <p style="text-align: justify;">{{ $fav->film->synopsisshort }}</p>
                    <div class="text-center">
                        <a href="{{ route('Detail', $fav->film->slug ) }}">
                            <button class="btn btn-dark" style="background-color: maroon;" type="button" onclick="sends(<%out.println(rs.getInt(1));%>))">
                                Learn more
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @empty
        @endforelse
		<% }
		rs.close();
		%>
	<br />
	<br />
	<a id="scroll" style="display: none;"><span></span></a>
	@include('partials.script')
@include('partials.Footer')

</body>


</html>
