
<!DOCTYPE html>
<html lang="en">


<head>
    <title>{{ $title ?? '' }} | Descfilm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">
    <link href="{{ asset('img/movie.png') }}" rel="shortcut icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @include('partials.Navbar')
	</head>

    @yield('body')
@include('partials.script')
@include('partials.Footer')
</html>
