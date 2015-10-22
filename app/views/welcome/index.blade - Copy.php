<!DOCTYPE html>
<html lang="en-US">
<head>
<title>CAAB</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<!-- Font for Heading--->
	<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
<!-- End Font --->
<!-----------------------------------------Menu Start----------------------------------->
<!-- jQuery -->
{{HTML::script("welcome-menu/libs/jquery-loader.js")}}
<!-- SmartMenus jQuery plugin -->
{{HTML::script("welcome-menu/jquery.smartmenus.js")}}
<!-- SmartMenus jQuery init -->
<script type="text/javascript">
	$(function() {
		$('#main-menu').smartmenus({
			subMenusSubOffsetX: 1,
			subMenusSubOffsetY: -8
		});
	});
</script>
<!-- SmartMenus core CSS (required) -->
{{HTML::style('welcome-menu/css/sm-core-css.css')}}
<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
{{HTML::style('welcome-menu/css/sm-blue/sm-blue.css')}}
<!-- #main-menu config - instance specific stuff not covered in the theme -->
<style type="text/css">
    /*Header*/
	.headerText{font-family: 'Lobster', Georgia, Times, serif;
    font-size: 2.9vw;color:#FFF;
    line-height: 50px;}
    /*End header*/
	/*Menu*/
	#main-menu {
		position:relative;
		z-index:9999;
		width:auto;
	}
	#main-menu ul {
		width:12em; /* fixed width only please - you can use the "subMenusMinWidth"/"subMenusMaxWidth" script options to override this if you like */
	}
	/*End Menu*/
	/*Start widget*/
		.widget{
			font-family:"PT Sans Narrow","Arial Narrow",Arial,Helvetica,sans-serif;
			font-size: 18px;
			font-weight: bold;
			line-height: 23px;
		}
	/*end widget*/
</style>
<!----Menu End------>
<!--Bootstrap start -->
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!--End Bootstrap -->
</head>
<body style='background:#ddd;'>

<div class='container-fluid'style="background:#357CA5!important;">
  <div class='container' >
  <div class='row'>	
   <div class='col-md-3'>
	<!--{{HTML::image('img/logo.png','User',array('class'=>'img-circle  pull-right','id'=>'logo-main','width'=>'80'))}}	-->
	</div>
	<div class='col-md-9' >
	<h3 class='headerText'>Action Safety Reporting Tracking and Management </h3>
	</div>
  </div>
  
  </div>
</div>
  
<div class='container' style="background:#fff!important;">
<!-- Sample menu definition -->
<nav  class="navbar navbar-default">
<ul id="main-menu" class="sm sm-blue">
  <li><a href="#">ASRTM</a></li>
  <li><a href="#">About</a></li>
  <li><a href="#">FAQ</a></li>
  <li><a href="#">Contact</a></li>
  <li><a href="#" data-toggle="modal" 
   data-target="#myModal">Login</a></li>
  
</ul>

</nav>
<div class='row'>
<div class='col-md-4'>
@if(Session::has('Warning'))
				
				 <div class="alert alert-warning">
				   <a href="#" class="close" data-dismiss="alert">
					  &times;
				   </a>
				   <strong>Warning!! </strong>{{Session::get('Warning')}}
				</div>
@endif
@if(Session::has('message'))
				
				 <div class="alert alert-success">
				   <a href="#" class="close" data-dismiss="alert">
					  &times;
				   </a>
				   <strong>Massage: </strong>{{Session::get('message')}}
				</div>
@endif
</div>
</div>
<div class='row'>
<!--News-->
<div class='col-md-4'>

<a href="#" class="list-group-item active widget">
   Publicly Accessible Area 
</a>
<a href="#" class="list-group-item">E-library</a>
<a href="#" class="list-group-item">Volunteer Reporting</a>
<a href="#" class="list-group-item">Wild Life Stike Reporting</a>

<a href="#" class="list-group-item active widget" ">
   News
</a>
<marquee style="border:1px dotted #DDD"  scrollamount=5 behavior=scroll height=200 direction=up> 
<a href="#" class="list-group-item">E-library</a>
<a href="#" class="list-group-item">Volunteer Reporting</a>
<a href="#" class="list-group-item">Wild Life Stike Reporting</a>
<a href="#" class="list-group-item">E-library</a>
<a href="#" class="list-group-item">Volunteer Reporting</a>
<a href="#" class="list-group-item">Wild Life Stike Reporting</a>
</marquee>

</div>
<!--Carasol -->
<div class='col-md-8'>
<div id="myCarousel" class="carousel slide">
   <!-- Carousel indicators -->
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>   
   <!-- Carousel items -->
   <div class="carousel-inner">
      <div class="item active">         
		 {{HTML::image('img/slider/slide1.png','slider',array('height'=>'200'))}}
      </div>
      <div class="item">
          {{HTML::image('img/slider/slide1.png','slider',array('height'=>'200'))}}
      </div>
      <div class="item">
         {{HTML::image('img/slider/slide1.png','slider',array('height'=>'200'))}}
      </div>
   </div>
   <!-- Carousel nav -->
   <a class="carousel-control left" href="#myCarousel" 
      data-slide="prev">&lsaquo;</a>
   <a class="carousel-control right" href="#myCarousel" 
      data-slide="next">&rsaquo;</a>
</div> 
</div>

</div>

</div>

<div class='container-fluid' style='color:#fff;background:#357CA5;padding:5px;'  >
	<p style='padding:13px 0px 0px 99px;' >Copywrite &copy; 2015 Nova Technology. All Right Reserved</p>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999">
   <div class="modal-dialog">
      <div class="modal-content">
	  <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Log In
            </h4>
         </div>
         <form role="form" action="login" method="POST">
							
								<div class="row" style="margin-top:20px">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Email Address" name="email" type="text" autofocus>
											
											</div>
												{{$errors->first('email')}}
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" value="">
												
											</div>
											{{$errors->first('password')}}
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
										</div>
									</div>
								</div>
							
						</form>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>
<!----- Bootstrap ---------------->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
<!----- Bootstrap ---------------->
<!------------->
</body>
</html>