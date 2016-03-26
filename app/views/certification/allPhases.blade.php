@extends('layout')
@section('content')
<section class="content contentWidth">
<div class = "page-header">
   
   <h1>
      All Phases 
      <small>With Progress Bar</small>
   </h1>
   
</div>
		<div class="row">
			<div class="col-md-12">
				<a   href="{{URL::to('certification/phase1')}}" class="text-center col-md-4">
				<button class="btn btn-primary btn-block">Phase-1
				  <div class="progress" style="height:25px!important;">
				  <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar"
				  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
				    40% 
				  </div>
				</div>
				</button>

				</a>
	
				<p class="text-center col-md-4">
				<button class="btn btn-primary btn-block">Phase-2
					<div class="progress">
				    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
				      40%
				    </div>
				    </div>
				</button>

				</p>
	
				<p class="text-center col-md-4">
				<button class="btn btn-primary btn-block">Phase-3
					<div class="progress">
				    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
				      40%
				    </div>
				    </div>
				</button>

				</p>
	
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block">Phase-4
					<div class="progress">
				    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
				      40%
				    </div>
				    </div>
				</button>

				</p>
	
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block">Phase-5
					<div class="progress">
				    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" >
				      10%
				    </div>
				    </div>
				</button>

				</p>
				<p class="text-center col-md-12">
				<button class="btn btn-primary btn-block">Over All Progress
					<div class="progress">
				    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" >
				      20%
				    </div>
				    </div>
				</button>

				</p>
	
			</div>
		</div>
</section>
<script type="text/javascript">
	
//progress bar
// Skills Progress Bar
$(function() {
  $('.progress-bar').each(function() {
    var bar_value = $(this).attr('aria-valuenow') + '%';                
    $(this).animate({ width: bar_value }, { duration: 2000, easing: 'easeOutCirc' });
  });
});
//end 
</script>
@stop