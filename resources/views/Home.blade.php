@extends('Main')

@section('body')
<body id="page-top" style="background-image: url('img/test.jpg');" onload="prefent()">


    <br/><br/><br/>
    <div class="slideshow-container" id="home" onmouseover="other()">
        <img class="mySlides" src="img/b.jpg" style="width:100%">
        <img class="mySlides" src="img/a.jpg" style="width:100%">
        <img class="mySlides" src="img/c.jpg" style="width:100%">
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
                <input class="form-control" type="text" placeholder="Search movie, genre, year..." aria-label="Search" id="search" name="search">
            </div>
            <div class='col-md-2'>
                <input type="submit"  class="btn btn-outline-white btn-block"  style="background-color: orange; color: white;" value="Search">
            </div>
        </div>
        </form>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-8">
@foreach ( $categories as $category)

<section onmouseover="{{ $category->genre }}()" id="{{ $category->genre }}">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="section-heading" style="color: white">{{ $category->genre }}</h2>
                    </div>
                </div>
                <div class="row d-flex justify-content-center" id="{{ $category->genre }}">
                    @php
                        $i=0;
                    @endphp
                    @foreach ( $movies as $movie )
                    @if ($movie->genre == $category->genre)
                    @php
                        $i++
                    @endphp
                    @if ($i>6)
                        @break
                    @endif
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
                    @endif
                    @endforeach
                    <a class="btn-block" href="{{ route('Search') }}?search={{ $category->genre }}">
                        <button type="button" class="btn btn-light btn-rounded btn-block" data-mdb-ripple-init data-mdb-ripple-color="dark">See More</button>
                    </a>
                </div>

            </section>
            @endforeach
        </div>
        <div class="col-md-4 d-sm-none d-md-block ">
            <div class="sticky-top " style=" padding-top: 100px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;">
                <div class="row d-flex justify-content-center text-center bg-warning text-white">
                    <h2 class="section-heading">Most Rated Movie</h2>
                </div>
                <div class="row d-flex justify-content-center bg-dark">
                    <div class="box-item " >
                        <a class="box-link" data-toggle="modal" href="#portfolio1Modal{{ $popular->id }}">
                            <img class="img-fluid px-5" src="{{ asset('storage/' . $popular->img) }}" onerror="this.onerror=null; this.src='{{ asset('img/cover.jpg') }}'" width="640px" height="426px">
                            <div class="portfolio-caption  rounded">
                                <h4 style="text-align: center; color: white">{{ $popular->title }}</h4>
                                <p style="text-align: center; color: white"> {{ $popular->scores }} <i class="fa fa-star" aria-hidden="true"></i>
                                <br/>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
    <a id="scroll" style="display: none;"><span></span></a>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript">

    @foreach ( $categories as $category )

    function {{ $category->genre }}(){
        document.getElementById("genre").innerHTML = "{{ $category->genre }}";
    }

    @endforeach

    function other(){
        document.getElementById("genre").innerHTML = "Choose Genre...";
    }
    </script>

</body>
@endsection
