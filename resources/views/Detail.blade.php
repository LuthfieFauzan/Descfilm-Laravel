
@extends('Main')

@section('body')
<body onload="prefent()" id="page-top" style="background-color: #1f2833">

    <br/><br/><br/><br/><br/>
    <div class="container">
        <div class=" d-flex justify-content-between row" style="color: white">
            <div class="col-6"><h2>{{ $movie->title }}</h2></div>
            <div class="col-6"><h2>Score:  {{ $movie->scores }} <i class="fa fa-star" aria-hidden="true"></i></h2></div>
          </div>
          <div class="row no-gutters">
              <div class="col-6 col-md-4">.<img src="{{ asset('storage/' . $movie->img) }}" onerror="this.onerror=null; this.src='img/cover.jpg'" width="300px">
                <br/>
                <br/>
                @auth
                @php
                    $favorite=0;
                @endphp
                @foreach ($movie->fav as $fav )
                @if ($fav->user_id==Auth::id())
                <form action="{{ route('removefav') }}" method="post">
                    @csrf
                    <input type="hidden" name="mid" id="mid" value="{{ $movie->id }}">
                    <input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
                <button class="btn btn-block btn-dark rounded-1" style="background-color: red; color: white;width: 300px" type="submit">remove favorite <i class="fa fa-heart"></i></button>
                </form>
                @php
                    $favorite=1;
                @endphp
                @endif
                @endforeach

                @if ($favorite!=1)
                <form action="{{ route('addfav') }}" method="post">
                @csrf
                <input type="hidden" name="mid" id="mid" value="{{ $movie->id }}">
                    <input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
                <button class="btn btn-block btn-dark rounded-1" style="background-color: red; color: white;width: 300px" type="submit">Add to favorite <i class="fa fa-heart-o"></i></button>
                </form>
                @endif


                @endauth
                @guest

                <a href="{{ route('Login') }}">
                <button class="btn btn-block btn-dark rounded-1" style="background-color: red; color: white;width: 300px" type="button">Add to favorite <i class="fa fa-heart-o"></i></button>
                </a>
                @endguest
            </div>
            <div class="col-12 col-sm-6 col-md-8">
                <table class="table table-responsive table-borderless table-sm" style="color: white;" id="tabel">
                <tr><td colspan="2">{{ $movie->synopsisshort }}</td></tr>
                <tr>
                    <td ><h5>Genre</h5></td>
                    <td>: {{ $movie->genre }}</td>
                </tr>
                <tr>
                    <td><h5>Language</h5></td>
                    <td>: {{ $movie->language }}</td>
                </tr>
                <tr>
                    <td><h5>Runtime</h5></td>
                    <td>: {{ $movie->runtime }}</td>
                </tr>
                <tr>
                    <td><h5>Producer</h5></td>
                    <td>: {{ $movie->producer }}</td>
                </tr>
                <tr>
                    <td><h5>Director</h5></td>
                    <td>: {{ $movie->director }}</td>
                </tr>
                <tr>
                    <td><h5>Distributor</h5></td>
                    <td>: {{ $movie->distributor }}</td>
                </tr>
                <tr>
                    <td><h5>Year</h5></td>
                    <td>: {{ $movie->year }}</td>
                </tr>
                <tr>
                    <td><h5>Rating</h5></td>
                    <td>: {{ $movie->rating }}</td>
                </tr>
                <tr>
                    <td><h5>Casts</h5></td>
                <td>: {{ $movie->casts }}</td>
            </tr>

                </table>
            </div>
          </div>
    </div>
    <br/>
    <br/>
    <div class="container">
        <div class="flip-container">
            <button id="flip" class="btn btn-block btn-dark rounded-1" style="background-color: orange; color: white;">Open trailer video</button>
            <button id="btn" class="btn btn-block btn-dark rounded-1" style="display: none; background-color: orange; color: white;">Close trailer video</button>
            <div id="panel">
                <div class="video-container" id="yutub">

                        <iframe width="853" height="480" src="{{ $movie->videourl }}"  frameborder="0" allowfullscreen></iframe>

                       </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="container" style="color: white;">
        <h4>Synopsis</h4><hr/>
        <div style="background-color: #0f0f0f;padding: 20px;border-radius: 10px ">
        <p style="text-align: justify" id="line1">
            {{ $movie->synopsisline1 }}
        </p>
        <p style="text-align: justify" id="line2">
            {{ $movie->synopsisline2 }}
        </p>
        </div>

    </div>
    <br/>




@empty($myreview)

<div  class="container"  id="review">
<form action="{{ route('addreview') }}" method="post">
@csrf
<input type="hidden" name="mid" id="mid" value="{{ $movie->id }}">
<div class="card">
<div class="row">
<div class="col-12">
    <div class="comment-box ml-2">
        <h4>Write a Review</h4>
        <div class="rating">Score the movie :
        <select name="rate" id="rate" class="form-select">
<option value="10" selected="selected">10</option>
<option value="9">9</option>
<option value="8">8</option>
<option value="7">7</option>
<option value="6">6</option>
<option value="5">5</option>
<option value="4">4</option>
<option value="3">3</option>
<option value="2">2</option>
<option value="1">1</option>
</select>
        </div>
        <br/>
        <div class="comment-area"><textarea class="form-control" name="review" placeholder="what is your Review" rows="4" required="required"></textarea> </div>
        <div class="comment-btns mt-2">
            <div class="row">
                <div class="col-6" style="padding: 12px;">
                @auth
                <input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
                <input type="submit" id="submits" class="btn btn-success send btn-sm" value="Post your review">
                @endauth
                @guest
                <a href="{{ route('Login') }}">
                <button class="btn btn-success send btn-sm" type="button">Login</button>
                </a>
                @endguest
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</form>
</div>
@endempty



    <div class="container mt-5">
    <div class="card">
@auth
@isset($myreview)


<div class="d-flex justify-content-center row" id="myreview">
<div class="col-md-12">
<div class="d-flex flex-column comment-section">
    <div class="p-2" style="border-bottom: double;" >
        <div class="d-flex justify-content-center row">
            <h4>My Review</h4>
        </div>
        <a href="{{ route('Profil', $myreview->akun->slug) }}" style="color: #0f0f0f">
        <div class="d-flex flex-row user-info" >

            <img class="rounded-circle"  src="{{ asset('storage/' . $myreview->akun->img) }}" onerror="this.onerror=null; this.src='{{ $myreview->akun->img }}'" width="50" height="50"style="object-fit: cover" >


            <div class="d-flex flex-column justify-content-start ml-2">
                <span class="d-block font-weight-bold name">{{ $myreview->akun->username }} <i class="fa fa-angle-double-right" style="color: black;font-size:26px"></i>&nbsp;&nbsp;{{ $myreview->akun->title }} </span>
                <span class="d-block font-weight-bold name">Rates: {{ $myreview->rates }} <i class="fa fa-star" aria-hidden="true"></i></span>
            </div>
        </div>
    </a>
       <br/>
           <div class="d-flex flex-column ml-2">
               <p>{{ $myreview->review_content }}</p>
           </div>
           <div class="d-flex flex-row fs-12">
               <div class="like cursor"> {{ $myreview->like }} Like</div>
               <form action="{{route('removereview')}}" method="post">
                @csrf
                <input type="hidden" name="mid" id="mid" value="{{ $movie->id }}">
                <input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
            </form>
            <button type="submit" data-toggle="modal" data-target="#modal{{ $myreview->review_id }}" style="border: none;background: none"><i class="fa fa-trash" style="border: thick;"></i>&nbsp;Delete</button>
           </div>
           {{$myreview->created_at }}
    </div>

</div>
</div>
</div>
<div class="modal fade" id="modal{{ $myreview->review_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Delete review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure want to delete Your review?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="{{route('removereview')}}" method="post">
            @csrf
            <input type="hidden" name="mid" id="mid" value="{{ $movie->id }}">
            <input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
            <input type="submit" class="btn btn-danger " value="Delete">
        </form>
        </div>
      </div>
    </div>
  </div>
@endisset

@endauth
<div style="border-bottom: double;">
    <div id="latest" class="d-flex justify-content-center row">
        <h4>Latest review</h4>
    </div>
    <div class="d-flex justify-content-center row">
        <div class="form-group">
            <form action="{{ route('Detail',$movie->slug)}}#latest" method="GET">
                <select onchange="this.form.submit()" name="rate" id="rate" class="btn btn-secondary btn-rounded form-control" id="exampleFormControlSelect1">
                    <option value="">Sort</option>
                    @for ($i=10;$i>0;$i--)
                        <option value="{{ $i }}"
                        @if (app('request')->input('rate')==$i)
                            selected
                        @endif >{{ $i }}</option>
                    @endfor
                </select>
            </form>
    </div>
    <br/>
</div>
</div>
@foreach ( $movie->review as $review)


<div class="d-flex justify-content-center row" id="review{{ $review->review_id }}">
    <div class="col-md-12">
        <div class="d-flex flex-column comment-section">
            <div class="p-2" style="border-bottom: double;" >
                <a href="{{ route('Profil', $review->akun->slug) }}" style="color: #0f0f0f">
                <div class="d-flex flex-row user-info">
                        <img class="rounded-circle" src="@if (preg_match('/http/i', $review->akun->img))
                        {{ $review->akun->img }}@else{{ asset('storage/' . $review->akun->img)}}
                        @endif" width="50" height="50"style="object-fit: cover"  onerror="this.onerror=null; this.src='{{ asset('img/profile.png') }}'" width="50">
                        <div class="d-flex flex-column justify-content-start ml-2">

                            <span class="d-block font-weight-bold name">{{ $review->akun->username }} <i class="fa fa-angle-double-right" style="color: black;font-size:26px"></i>&nbsp;&nbsp;{{ $review->akun->title }} </span>
                            <span class="d-block font-weight-bold name">Rates: {{ $review->rates }}<i class="fa fa-star" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </a>
                    <br/>
                    <div class="d-flex flex-column justify-content-start ml-2"  >
                    <p class="p-2">{!! $review->review_content !!}</p>
                </div>
                <div class="d-flex flex-row fs-12">
                    <div class="like cursor">{{ $review->like }} Like &nbsp;</div>
                    @auth
                    @php
                      $mylike=0
                    @endphp
                    @isset($like)
                    @foreach ($like as $l )
                    @if ($l->review_id==$review->review_id)
                    @php
                      $mylike=1
                    @endphp
                    @endif
                    @endforeach
                    @endisset
                    @if ($mylike==1)
                    <form action="{{ route('removelike') }}" method="post">
                        @csrf
                        <input type="hidden" name="rid" id="rid" value="{{ $review->review_id }}">
                        <input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
                        <button type="submit" style="border: none;background: none"><i class="fa fa-heart" style="color: red"></i></button>
                    </form>
                    @else
                    <form action="{{ route('addlike') }}" method="Post">
                        @csrf
                        <input type="hidden" name="rid" id="rid" value="{{ $review->review_id }}">
                        <input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
                        <button type="submit" style="border: none;background: none"><i class="fa fa-heart-o" style="border: thick;"></i></button>
                    </form>
                    @endif
                    @php
                    @endphp
                    @endauth
                    @guest
                    <a href="{{ route('Login') }}">
                    <button type="button" style="border: none;background: none"><i class="fa fa-heart-o" style="border: thick;"></i></button>
                    </a>
                    @endguest
                </div>
                {{$review->created_at }}
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="d-flex justify-content-center">
    {{ $movie->review->links() }}
</div>
    </div>
    </div>
    <br/>
    <a id="scroll" style="display: none;"><span></span></a>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('js/slideupdown.js') }}"></script>
</body>
@endsection
