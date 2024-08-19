

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: darkred" id="mainNav">
			<div class="container">
				<a class="navbar-brand js-scroll-trigger" href="{{ route('Home') }}" style="color: white;">Descfilm</a>
		        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: firebrick; color: white;">
		            	<span class="navbar-toggler-icon my-toggler"></span>
					</button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                      @isset($categories)
                          <li class="nav-item dropdown">
                              <a href="#" class="nav-link dropdown-toggle" id="genre" data-toggle="dropdown">Choose Genre...<b class="caret"></b></a>
                              <ul class="dropdown-menu multi-column columns-3" style="background: darkred">
                                  <li>
                                      <div>
                                          <ul style="list-style-type: none; padding: 0px;">
                                              @foreach ( $categories as $category )

                                              <li class="nav-item">
                                                  <a class="nav-link js-scroll-trigger" onclick="{{ $category->genre }}()" href="{{ route('Home') }}#{{ $category->genre }}">{{ $category->genre }}</a>
                                              </li>
                                              @endforeach


                                          </ul>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                      @endisset
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('About') }}">About Us</a>
                        </li>

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Login') }}">Login</a>
                        </li>
                        @endguest
                        @auth()
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
                        @endauth

			</div>
		</nav>
