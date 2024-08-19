@extends('Main')

@section('body')
	<body id="page-top" style="background-image: url('{{ asset('img/test.jpg') }}');" onload="prefent()">
    	<br/><br/><br/>
    	<div class="slideshow-container" id="home" onmouseover="other()">
            <img class="mySlides" src="{{ asset('img/b.jpg') }}" style="width:100%">
            <img class="mySlides" src="{{ asset('img/a.jpg') }}" style="width:100%">
            <img class="mySlides" src="{{ asset('img/c.jpg') }}" style="width:100%">
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
    	<br/><br/><br/>
	    <header class="bg-transparent" onmouseover="other()">
	        <div class="container text-center">
	            <h1 style="color: white">Source on Most of Movie Details</h1>
	            <p class="lead" style="color: white">Getting detail of many popular movies made easier with Descfilm</p>
	        </div>
		</header>
		<br/><br/>
		<div class="container">
			<form action="{{ route('Search') }}" method="get">
                <div class="row">
                    <div class='col-md-10'>
                        <input class="form-control" value="{{ app('request')->input('search') ?? '' }}" type="text" placeholder="Search movie, genre, year..." aria-label="Search" id="search" name="search">
                    </div>
                    <div class='col-md-2'>
                        <input type="submit"  class="btn btn-outline-white btn-block"  style="background-color: orange; color: white;" value="Search">
                    </div>
                </div>
                </form>
		</div>

		<section onmouseover="other()" id="sears">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="section-heading" style="color: white">Searching for '{{ app('request')->input('search') ?? '' }}'</h2>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-end">
                            <h3 class="section-heading" style="color: white">Sort</h3>
                            <form action="" method="GET">
                                <input type="hidden" name="search" value="{{ app('request')->input('search')}}">
                                @if ( app('request')->input('sort')=='asc')
                                <input type="hidden" name="sort" value="desc">
                                <button type="submit" style="border: none;background: none"><i class="fa fa-sort-alpha-asc fa-2x" style="color: white"></i></button>
                        @else ()
                        <input type="hidden" name="sort" value="asc">
                        <button type="submit" style="border: none;background: none"><i class="fa fa-sort-alpha-desc fa-2x" style="color: white"></i></button>
                        @endif
                    </form>
                    <form action="" method="GET">
                        <input type="hidden" name="search" value="{{ app('request')->input('search')}}">
                        @if ( app('request')->input('rate')=='asc')
                        <input type="hidden" name="rate" value="desc">
                        <button type="submit" style="border: none;background: none"><i class="fa fa-sort-numeric-asc fa-2x" style="color: white"></i></button>
                @else ()
                <input type="hidden" name="rate" value="asc">
                <button type="submit" style="border: none;background: none"><i class="fa fa-sort-numeric-desc fa-2x" style="color: white"></i></button>
                @endif
            </form>
                            </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center" id="Search">
                    @foreach ( $movies as $movie )


            <div class="col-md-4 mb-4 box-item" >
            <a class="box-link" data-toggle="modal" href="#portfolio1Modal{{ $movie->id }}">
                <div class="box-hover">
                    <div class="portfolio-hover-content">
                        <p style="text-align: center; color: white"> {{ $movie->scores }} <i class="fa fa-star" aria-hidden="true"></i> </p>
                    </div>
                </div>
                <img class="img-fluid" src="{{ asset('storage/' . $movie->img) }}" onerror="this.onerror=null; this.src='{{ asset('img/cover.jpg') }}'" width="640px" height="426px">
            </a>
            <div class="portfolio-caption">
                <h4 style="text-align: center; color: white">{{ $movie->title }}</h4>
                <p style="text-align: center; color: white"> {{ $movie->genre }} </p>
            </div>
        </div>

            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $movies->links() }}
        </div>
            </div>
		</section>
		<br/><br/>
        @foreach ( $movies as $movie )

        <div class="modal fade" id="portfolio1Modal{{ $movie->id }}"  tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-uppercase">{{ $movie->title }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="video-container">
                        <iframe width="853" height="480" src="{{ $movie->videourl }}"  frameborder="0" donotallowfullscreen></iframe>
                    </div>
                    <p style="text-align: justify;">{{ $movie->synopsisshort }}</p>
                    <div class="text-center">
                        <a href="{{ route('Detail', $movie->slug ) }}">
                            <button class="btn btn-dark" style="background-color: maroon;" type="button" onclick="sends({{ $movie->id }})">
                                Learn more
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endforeach

		<br/><br/>

	</body>
@endsection
