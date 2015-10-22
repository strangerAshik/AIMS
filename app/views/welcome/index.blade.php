@include('welcome/header')
@yield('header')
<style type="text/css">
  .disNon{display: none;}
</style>
<div class='row'>
<!--News-->
<div class='col-md-4'>

<a href="#" class="list-group-item active widget">
   Publicly Accessible Area 
</a>
<a href="{{URL::to('libraryPublicView')}}" class="list-group-item" target='_blink'>E-library</a>
<a href="{{URL::to('volanteerReporting')}}" class="list-group-item disNon">Volunteer Reporting</a>
<a href="#" class="list-group-item disNon">Wild Life Strike Reporting</a>
<a href="#" class="list-group-item disNon">Incident Reporting</a>
<a href="#" class="list-group-item disNon">Automated Height Certification</a>

<a href="#" class="list-group-item active widget" >
Notice Board
</a>
<!-- <marquee style="border:1px dotted #DDD"  scrollamount='2' behavior=ALTERNATE height='300' direction=up> -->
<a href="#" class="list-group-item">ASRTM Partially Released</a>
<a href="#" class="list-group-item">Update Your Employee Information</a>
<a href="#" class="list-group-item">Update Aircraft Information</a>
<a href="#" class="list-group-item">Safety Concern Module Released</a>
<a href="#" class="list-group-item">Supporting Document Now Publicly Accessable</a>
<!--</marquee>-->

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
		 {{HTML::image('img/slider/slide3.jpg','slider',array('height'=>'200'))}}
      </div>
      <div class="item">
          {{HTML::image('img/slider/slide2.jpg','slider',array('height'=>'200'))}}
      </div>
      <div class="item">
         {{HTML::image('img/slider/slide1.jpg','slider',array('height'=>'200'))}}
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


<!--ON TEST MODAL-->
<style>
.modal-headerontest {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #0480be;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
 }
</style>
<!-- Modal -->
<div class="modal fade" id="ontest" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-headerontest">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
               ASRTM Is On Test Phase
            </h4>
         </div>
         <div class="modal-body">
           <h4>Welcome To ASRTM Database</h4>
		   <p>We Are In Test Phase And Will Be Operational Soon.</br> Thanks</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">Close
            </button>
 
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
   $(function () { $('#ontest').modal({
      keyboard: true
   })});
</script>
<!------End ON TEST MODAL--------->



@include('welcome/footer')
@yield('footer')