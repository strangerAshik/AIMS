@extends('layout')
@section('content')
<section class='content widthController'>
	<div class="row">
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-aqua " >
				<div class="inner">
					<h4 style='font-weight:bold;'>General</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/general');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
			
			@if('true'==CommonFunction::hasPermission('pel_flying_details',Auth::user()->emp_id(),'access'))	
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-blue" >
				<div class="inner">
					<h4 style='font-weight:bold;'>Flying Details</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/flyingDetails');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
			@endif
			@if('true'==CommonFunction::hasPermission('pel_simulator',Auth::user()->emp_id(),'access'))
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
				<div class="small-box bg-green " >
					<div class="inner">
						<h4 style='font-weight:bold;'>Simulator</h4>
						
					</div>
				  
					<a class="small-box-footer" href="{{URL::to('pel/simulator')}}">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
			@endif
			
			@if('true'==CommonFunction::hasPermission('pel_ame_log_details',Auth::user()->emp_id(),'access'))	
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-red  " >
				<div class="inner">
					<h4 style='font-weight:bold;'>AME Log Details</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/ameLogDetails');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
			@endif
			@if('true'==CommonFunction::hasPermission('pel_atc_log_details',Auth::user()->emp_id(),'access'))
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
				<div class="small-box bg-yellow" >
					<div class="inner">
						<h4 style='font-weight:bold;'>ATC Log Details</h4>
						
					</div>
				  
					<a class="small-box-footer" href="{{URL::to('pel/atcLogDetails')}}">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
			@endif
	</div>

</section>
@stop