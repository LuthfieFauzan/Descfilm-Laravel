<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">
    <link href="{{ asset('img/movie.png') }}" rel="shortcut icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
<title id="title">Change password</title>

</head>

<body id="page-top" style="background-color: #1f2833">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: darkred" id="mainNav">
			<div class="container">
				<a class="navbar-brand js-scroll-trigger" href="{{ route('Home') }}" style="color: white;">Descfilm</a>
		        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: firebrick; color: white;">
		            	<span class="navbar-toggler-icon my-toggler"></span>
					</button>
		            <div class="collapse navbar-collapse" id="navbarResponsive">
				</div>
			</div>
		</nav>
    	<br/><br/><br/>
        <form action="changepass" method="post">
    	<div class="container" id="regist">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center" style="background-color: darkred; color: white;">Change Password</div>
                <div class="card-body">
					<input name="id" type="hidden" value="<%= session.getAttribute("idu")%>">
                    <div class="form-group">
                    	<div class="form-group">
                    		Old Password
							<input id="inputoPassword" name="oldpass" class="form-control" label="Password" required="true" type="password" redisplay="true"/>
                            <p for="inputPassword" style="color:red"></p>
                        </div>
                    	<div class="form-group">
                    		New Password
							<input id="inputPassword" name="newpass" class="form-control" label="Password" required="true" type="password" redisplay="true"/>
                            <p for="inputPassword" style="color:red"></p>
                        </div>
                        <div class="form-group">
                    		Confirm password
							<input id="inputcPassword" name="cpass" class="form-control" label="cPassword" required="true" type="password" redisplay="true"/>
                            <p for="inputcPassword" style="color:red">
                            </p>
                        </div>
                        <p id="text" value="" style="color: red; text-transform: uppercase; align-content: center">
                        <%
                        try{
                        	if(request.getParameter("error")!=null){
                        		out.print("Wrong password");
                        	}
                        }catch(Exception e){

                        }

                            %>
                        </p>
                    <input type="submit" value="Confirm" class="btn btn-block btn-info" style="color: white;">
                    <br/>
                     <a href="{{ route('Profil') }}">
                     <button class="btn btn-block btn-danger" style="color: white;" type="button" value="cancel" >Cancel</button>
                     </a>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <br><br><br>
@include('partials.Footer')
@include('partials.script')

</body>
</html>
