
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

        <br/>
        <div class="container" style="background-color: brown; color: white">
        	<div id="forms" >
	        	<div class="col-md-12">
		        	<h4 class="text-center mb-3">Movie Data Form</h4>
		        	<form id="tesform" name="movieForm" enctype="multipart/form-data"  class="form-group needs-validation" action="{{ route('editfilm') }}" method="POST">
		            	@csrf
                        <div class="row">
		            	<input type="hidden" name="id" value="{{$movie->id }}" >
		                    <div class="col-md-7 mb-3 @error('title') is-invalid @enderror">
		                    	<label for="title">Title</label>
		                        <input type="text" id="title" value="{{ old('title') ??$movie->title }}" name="title" class="form-control" ng-minlength="1" placeholder="*required" required >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
		                    <div class="col-md-5 mb-3 @error('genre') is-invalid @enderror" >
								<label for="genre">Genre</label>
								<input type="text" id="genre" name="genre" class="form-control" ng-minlength="1" value="{{ old('genre') ?? $movie->genre }}"  placeholder="*required" required>
                                @error('genre')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
						</div>
		                <div class="row">
							<div class="col-md-2 mb-3 @error('language') is-invalid @enderror" >
		                    	<label for="language">Language</label>
								<input type="text" id="language" name="language" class="form-control" ng-minlength="1" value="{{ old('language') ?? $movie->language }}"  placeholder="*required" required>
                                @error('language')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
		                    <div class="col-md-2 mb-3 @error('runtime') is-invalid @enderror" >
		                    	<label for="runtime">Runtime (minutes)</label>
		                        <input type="text" id="runtime" name="runtime" class="form-control" ng-minlength="2" value="{{ old('runtime') ?? $movie->runtime }}" placeholder="*required" required>
                                @error('runtime')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
		                    <div class="col-md-8 mb-3 @error('producer') is-invalid @enderror" >
		                    	<label for="producer">Producer</label>
		                        <input type="text" id="producer" name="producer" class="form-control" ng-minlength="1" value="{{ old('producer') ?? $movie->producer }}" placeholder="*required" required>
                                @error('producer')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
						</div>
		                <div class="row">
		                	<div class="col-md-3 mb-3 @error('director') is-invalid @enderror" >
		                    	<label for="director">Director</label>
		                        <input type="text" id="director" name="director" class="form-control" ng-minlength="1" value="{{ old('director') ?? $movie->director }}" placeholder="*required" required>
								@error('director')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
		                    <div class="col-md-5 mb-3 @error('distributor') is-invalid @enderror" >
		                    	<label for="distributor">Distributor</label>
		                        <input type="text" id="distributor" name="distributor" class="form-control" ng-minlength="1" value="{{ old('distributor') ?? $movie->distributor }}" placeholder="*required" required>
								@error('distributor')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
		                    <div class="col-md-2 mb-3 @error('year') is-invalid @enderror" >
		                    	<label for="year">Year</label>
		                        <input type="number" id="year" name="year" class="form-control" ng-minlength="4" value="{{ old('year') ?? $movie->year }}" placeholder="*required" required>
								@error('year')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
		                    <div class="col-md-2 mb-3 @error('rating') is-invalid @enderror" >
		                    	<label for="rating">Rating</label>
								<select class="custom-select d-block w-100" id="rating" name="rating" class="form-control" required>

                                    <option value="">Rating...</option>
	                                <option value="E">E</option>
	                                <option value="PG">PG</option>
	                                <option value="PG-13">PG-13</option>
	                                <option value="R">R</option>
	                            </select>
	                            <script type="text/javascript">
	                            document.getElementById("rating").value = "{{$movie->rating}}";
	                            </script>
								@error('rating')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
						</div>
		                <div class="row">
		                	<div class="col-md-12 mb-3 @error('casts') is-invalid @enderror" >
		                    	<label for="casts">Casts</label>
		                        <textarea id="casts" name="casts" class="form-control" ng-minlength="1"   placeholder="*required" rows="1" required>{!! old('casts') ?? $movie->casts !!}</textarea>
								@error('casts')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
		                    <div class="col-md-12 mb-3 @error('synopsisshort') is-invalid @enderror" >
		                    	<label for="synopsisshort">Synopsis Short</label>
		                        <textarea id="synopsisshort" name="synopsisshort" class="form-control" ng-minlength="1"  placeholder="*required" rows="2" required>{!! old('synopsisshort') ?? $movie->synopsisshort !!}</textarea>
								@error('synopsisshort')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
						</div>
		                <div class="row">
		                	<div class="col-md-12 mb-3 @error('synopsisline1') is-invalid @enderror" >
		                    	<label for="synopsisline1">Synopsis Line 1</label>
		                        <textarea id="synopsisline1" name="synopsisline1" class="form-control" ng-minlength="1"  placeholder="*required" rows="5" required>{!! old('synopsisline1') ?? $movie->synopsisline1 !!}</textarea>
								@error('synopsisline1')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
		                    <div class="col-md-12 mb-3">
		                    	<label for="synopsisline2">Synopsis Line 2</label>
		                        <textarea id="synopsisline2" name="synopsisline2"  class="form-control" rows="5">{!! old('synopsisline2') ?? $movie->synopsisline2 !!}</textarea>
							</div>
						</div>
		                <div class="row">
		                	<div class="col-md-6 mb-3 @error('videourl') is-invalid @enderror" >
		                    	<label for="videourl">Video URL</label>
		                        <input type="text" id="videourl" name="videourl" class="form-control" ng-minlength="1" value="{{ old('videourl') ?? $movie->videourl }}"  placeholder="*required" required>
								@error('videourl')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
							<div class="col-md-6 mb-3">
		                    	<label for="files">Image</label>
		                    	<input type="file" id="files" accept="image/*"  name="files"  class="form-control">
		                    	<textarea style="display: none" id="a" name="a" rows="" cols="">0</textarea>
							</div>
						</div>
						<div class="d-flex justify-content-center col-md-12 mb-6">
		                	<ul class="row list-inline">
								{{-- <li class="list-inline-item">
									<button id="addBtn"  class="btn btn-info btn-block" type="submit" value="Add movie" name="addBtn">Add movie</button>
								</li> --}}
								<li class="list-inline-item">
									<button id="updateBtn" class="btn btn-warning btn-block" type="submit" value="Update movie data" name="updateBtn">Edit movie data</button>
								</li>
								<li class="list-inline-item">
                                    <input type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal{{ $movie->id }}" value="Delete">

								</li>
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
								{{-- <li class="list-inline-item">
									<button id="clearBtn" style="display: <%if(session.getAttribute("ed")==""|| session.getAttribute("ed")==null){out.println("unset");}else{out.println("none");} %>;background-color: grey; color: white" class="btn btn-block" type="reset" value="Clear form" name="clearBtn">Clear form</button>
								</li> --}}
								<li class="list-inline-item">
								<a href="{{ route('dashboard') }}">
									<button id="cancel"  style="background-color: black; color: white" type="button" class="btn btn-block" value="Cancel" name="cancel" onclick="">Cancel</button>
								</a>
						        </li>
							</ul>
						</div>
					</form>
	        	</div>
			</div>
        </div>
        <br/>

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
