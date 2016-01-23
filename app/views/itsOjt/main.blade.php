@extends('layout')
@section('content')
<section class='content contentWidth'>
	<div class="row">
    <div class="col-md-12">


                        @if('true'==CommonFunction::hasPermission('its_my_its_records',Auth::user()->emp_id(),'access'))
                            
                        <div class="col-md-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>My ITS Records</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('itsOjt/itsRecords');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('its_add_trainee',Auth::user()->emp_id(),'access'))
                            
                        <div class="col-md-4">
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

						@if('true'==CommonFunction::hasPermission('its_formal_course_and_job_task',Auth::user()->emp_id(),'access'))
                             
                        <div class="col-md-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Add Formal Course & Job Task</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('itsOjt/addCourse');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif	
						@if('true'==CommonFunction::hasPermission('its_course_ojt_list',Auth::user()->emp_id(),'access'))
                             
                        <div class="col-md-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Course / OJT List</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('itsOjt/courseList');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
                        

                        @if('true'==CommonFunction::hasPermission('its_assign_course_and_ojt',Auth::user()->emp_id(),'access'))
                        <div class="col-md-4">
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
                        @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'access'))

                        <div class="col-md-4">
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
                      

                        @if('true'==CommonFunction::hasPermission('its_central_search',Auth::user()->emp_id(),'access'))

                        <div class="col-md-4">
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
                        @if('true'==CommonFunction::hasPermission('its_report',Auth::user()->emp_id(),'access'))
                        <div class="col-md-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Report</h4>
                            </div>
                            
                            <a class="small-box-footer" href="" onclick="alert('under Development')">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif

        </div>
    </div>
</section>
@stop