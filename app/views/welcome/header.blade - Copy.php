@section('header')
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
  
<div class='container' style="background:#fff!important;min-height: 700px;">
<!-- Sample menu definition -->
<nav  class="navbar navbar-default">
<ul id="main-menu" class="sm sm-blue">
  <li><a href="{{URL::to('/')}}">ASRTM</a></li>
  <li><a href="{{URL::to('about')}}">About</a></li>
  <li><a href="{{URL::to('faq')}}">FAQ</a></li>
  <li><a href="{{URL::to('contact')}}">Contact</a></li>
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
@stop