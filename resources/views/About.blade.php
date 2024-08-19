@extends('Main')

@section('body')

<body onload="prefent()" id="page-top" style="background-color: #1f2833" ng-app="validationApp" ng-controller="mainController">
    <jsp:include page="navbar.jsp"></jsp:include>
    <br/><br/><br/>

    <br/><br/><br/>
    <div class="container">
        <h1 class="text-center" style="color: white;"><b>About Descfilm</b></h1>
        <br/><br/>
        <h5 style="text-align: justify; color: white;">Descfilm is an established website to let you know on movie release informations. In here user can share their comment / thought of the movie so other people can see their comment / thought about the movie</h5>
        <h5 style="text-align: justify; color: white;">More movies will be added, so keep in touch with us!</h5>
        <br/>
        <h6 style="text-align: right; color: white;"><i>Happy watching!</i></h6>
        <br/><br/><br/>
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5">
                        <h2 style="color: white;">Our Base</h2><hr/>

                        <iframe width="100%" height="400px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCBxS680K7oSbq5Qbh9_dNhWKy7FKXgEOg&q=Asia+e+university" donotallowfullscreen></iframe>
                    </div>
                    <div class="col-lg-6">
                        <form name="userForm" action="feedback" method="post" onsubmit="return confirm('Confirm?');"  novalidate="novalidate">
                            <h2 style="color: white;">Leave a Feedback for Us</h2><hr/>
                            <div class="form-group row" >
                                <div class="col-md-12">
                                    <label for="message" style="color: white"><b>Your Feedback</b></label>
                                    <textarea type="text" id="message" name="message" class="form-control" placeholder="*required" cols="15" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mr-auto">
                                    @auth
                                    <input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
                                   <input type="submit" class="btn btn-block btn-dark rounded-1" style="background-color: orange; color: white;" value="Submit my Message">
                                    @endauth
                    @guest
                    <a href="{{ route('Login') }}">
                    <button class="btn btn-success send btn-sm" type="button">Submit</button>
                    </a>
                    @endguest
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>

    </body>
    <div class="btn-block"style="background-color: darkred;text-align: center">
        <a href="{{ route('Admin') }}" style="color: darkred" class="" >LOGIN ADMIN</a>
        </div>
@endsection
