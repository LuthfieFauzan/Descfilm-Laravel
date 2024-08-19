<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: darkred" id="mainNav">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="navbar-brand" style="color: white">Descfilm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: firebrick; color: white;">
            <span class="navbar-toggler-icon my-toggler"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item dropdown">
                    <a id="sectionnav" href="#" class="nav-link dropdown-toggle" id="sectionss" data-toggle="dropdown" style="display: <%if(session.getAttribute("ids")==""|| session.getAttribute("ids")==null||session.getAttribute("ed")!=""){out.println("none");}else{out.println("unset");} %>">Sections<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-column columns-3" style="background: darkred">
                        <li>
                            <div>
                                <ul style="list-style-type: none; padding: 0px;">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger" href="#table1">Movie List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger" href="#table2">Visitor Message</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <form action="{{ route('logoutadmin') }}" method="POST">
                        @csrf
                        <button style="border:0px solid black; background-color: transparent;" class="nav-link" type="submit">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></button>
                    </form></li>
            </ul>
        </div>
    </div>
</nav>
