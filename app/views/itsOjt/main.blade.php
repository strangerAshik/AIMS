@extends('layout')
@section('content')
<section class='content contentWidth'>
	<div class="row">
    <div class="col-md-12">


                        @if('true'==CommonFunction::hasPermission('its',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Add Trainee</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('itsOjt/addTrainee');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif

						@if('true'==CommonFunction::hasPermission('its',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Formal Course & Job Task</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('itsOjt/addCourse');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif	
						@if('true'==CommonFunction::hasPermission('its',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Course/OJT List</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('itsOjt/courseList');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
                        

                        @if('true'==CommonFunction::hasPermission('its',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Assign Course & OJT</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('itsOjt/assignCourseAndOjt');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif 
                        @if('true'==CommonFunction::hasPermission('its',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Review / Update Tasks &Courses</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('itsOjt/addTrainingOjt');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif  

                        @if('true'==CommonFunction::hasPermission('its',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>ITS Central Search</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('itsOjt/centralSearch');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('its',Auth::user()->emp_id(),'report'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Report</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('organization/organizationList');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif

        </div>
    </div>
</section>
@stop