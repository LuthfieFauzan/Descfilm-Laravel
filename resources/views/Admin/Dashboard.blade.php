
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
@include('partials.Navadmin')
        <br/><br/><br/><br/><br/><br/>

        <div class="container">
        		<div class="row">
	                <div class="col-md-12" >
	                    <h3 class="mt-5 mb-5 text-center text-uppercase" style="color: white;">movie list</h3>
                        <a href="{{ route('add.film') }}">
                            <button id="add" class="btn btn-info">Add a new movie</button>

                        </a>
                        <br/><br/>
						<table class="text-center table table-bordered pb-5" id="movietbl" width="100%" cellspacing="0" style="background-color:white">
	                        <thead style="background-color: brown; color:white">
	                        	<tr>
		                        	<th>No</th>
		                        	<th>Title</th>
		                            <th>Genre</th>
		                            <th>Language</th>
		                            <th>Runtime</th>
		                            <th>Year</th>
		                            <th>Image</th>
		                            <th>Action</th>
								</tr>
	                        </thead>
	                       @foreach ($movies as $movie )

                           <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $movie->title }}</td>
                   <td>{{ $movie->genre }}</td>
                   <td>{{ $movie->language }}</td>
                   <td>{{ $movie->runtime }}</td>
                   <td>{{ $movie->year }}</td>
                   <td><img class="img-fluid" src="{{ asset('storage/' . $movie->img) }}" width="90px" height="120px"></td>
                   <td>

                   <a href="{{ route('edit.film', $movie->slug) }}" ><input type="submit" style="color:black;background-color:orange" class="btn  btn-block" value="Edit"></a>

                       <br/>
                    <input type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal{{ $movie->id }}" value="Delete">
                   </td>
                   </tr>
                   <div class="modal fade" id="modal{{ $movie->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Delete {{ $movie->title }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure want to delete {{ $movie->title }}?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{ route('removefilm') }}" method="post">
                            @csrf
                            <input type="hidden" name="mid" id="mid" value="{{ $movie->id }}">
                            <input type="submit" class="btn btn-danger " value="Delete">
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                           @endforeach

	                    </table>
                        <div class="d-flex justify-content-center">

                            {{ $movies->links() }}
                        </div>
	                </div>
	            </div>

        </div>
        <br/>

        <br/>
		<div class="container">
			<div id="table2">
				<div class="row">
	                <div class="col-md-12" >
	                    <h3 style="color: white">Visitor Feedbacks</h3>
	                    <table class="text-center table table-bordered pb-5" id="suggestiontbl" width="100%" cellspacing="0" style="background-color: white">
	                        <thead>
	                        	<tr>
		                        	<th style="background-color: brown; color: white">Name</th>
		                        	<th style="background-color: brown; color: white">Message</th>
								</tr>
                                @foreach ( $feeds as $feed )

								<tr>
		                        	<td >{{ $feed->akun->username }}</td>
		                        	<td >{{ $feed->feedbacks }}</td>
								</tr>
                                @endforeach
	                        </thead>
	                    </table>
                        <div class="d-flex justify-content-center">

                            {{ $feeds->links() }}
                        </div>
	                </div>
	            </div>
			</div>
        </div>
        <br/><br/><br/>
        @include('partials.Footer')
		<a id="scroll" style="display: none;"><span></span></a>
        @include('partials.script')
        <script src="{{ asset('js/angular-validatemovie.js') }}"></script>
        <script src="{{ asset('js/angular.js') }}"></script>
        <script src="{{ asset('js/logicadmin.js') }}"></script>

        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
       <script type="text/javascript">
       var input = document.querySelector('input[type=file]');
       var textarea = document.getElementById('a');

       function readFile(event) {
         textarea.textContent = "1";
         console.log(event.target.result);
       }

       function changeFile() {
         var file = input.files[0];
         var reader = new FileReader();
         reader.addEventListener('load', readFile);
         reader.readAsText(file);
       }
       input.addEventListener('change', changeFile);
       </script>

    </body>
</html>
