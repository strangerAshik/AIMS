@extends('layout')
@section('content')

<section class='content widthController' >

    
                      
						
	<div class="row">
			@if('true'==CommonFunction::hasPermission('pel_list',Auth::user()->emp_id(),'access'))			
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-aqua " >
				<div class="inner">
					<h4 style='font-weight:bold;'>PEL List</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/pelList');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
			@endif		
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-blue" >
				<div class="inner">
					<h4 style='font-weight:bold;'>Personal Info.</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/personalInfo');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
		
			<!--
			@if('true'==CommonFunction::hasPermission('sc_safety_concerns_list',Auth::user()->emp_id(),'access'))
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
			
				<div class="small-box bg-green " >
					<div class="inner">
						<h4 style='font-weight:bold;'>Activity Status</h4>
						
					</div>
				  
					<a class="small-box-footer" href="{{URL::to('#')}}">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
			@endif
			-->
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-aqua " >
				<div class="inner">
					<h4 style='font-weight:bold;'>Academic Qualification</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/accademicQali');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
		
			<!--		
			@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'access'))	
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				
			<div class="small-box bg-red  " >
				<div class="inner">
					<h4 style='font-weight:bold;'>Contact Info.</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('#');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div>
			@endif
			-->
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
				<div class="small-box bg-yellow" >
					<div class="inner">
						<h4 style='font-weight:bold;'>Language Proficiency</h4>
						
					</div>
				  
					<a class="small-box-footer" href="{{URL::to('pel/languageProficiency')}}">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
				<div class="small-box bg-maroon" >
					<div class="inner">
						<h4 style='font-weight:bold;'>Designee Records</h4>
						
					</div>
				  
					<a class="small-box-footer" href="{{URL::to('pel/designeeRecords')}}">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-blue " >
				<div class="inner">
					<h4 style='font-weight:bold;'>Medical Certification</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/medicalCertificate');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-purple" >
				<div class="inner">
					<h4 style='font-weight:bold;'>License Info.</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/licenseInfoMain');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
				<div class="small-box bg-green " >
					<div class="inner">
						<h4 style='font-weight:bold;'>License History</h4>
						
					</div>
				  
					<a class="small-box-footer" href="{{URL::to('pel/licenseHistory')}}">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-aqua " >
				<div class="inner">
					<h4 style='font-weight:bold;'>Training Details</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/trainingDetails');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
			<div class="small-box bg-red  " >
				<div class="inner">
					<h4 style='font-weight:bold;'>Logbook Review</h4>
				</div>
				
				<a class="small-box-footer" href="{{URL::to('pel/logbookReview');}}">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
			</div><!-- ./col -->
		
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
				<div class="small-box bg-yellow " >
					<div class="inner">
						<h4 style='font-weight:bold;'>Comprehensive View</h4>
						
					</div>
				  
					<a class="small-box-footer" href="{{URL::to('pel/compView/'.Auth::user()->emp_id())}}">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
		
			@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'report'))
			<div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
				<!-- small box -->
				<div class="small-box bg-blue " >
					<div class="inner">
						<h4 style='font-weight:bold;'>Report</h4>
						
					</div>
				  
					<a class="small-box-footer" href="{{URL::to('#')}}">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><!-- ./col -->
			@endif
						
					
	</div>
</section>
@stop