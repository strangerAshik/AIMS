{{--
Page Description:
aircraft landing page, 
--}}
@extends('layout')
@section('content')

<section class='content' >
<!--Instruction Start-->
 <?php
  $module='aircraft';
  $instructions=CommonFunction::getModuleInstructions($module);?>
  @include('commonInstruction')
  @yield('instruction')
<!--End Instruction-->

    <div class="row" style='margin:0px 0px 0px 0px;;'>
                      
						
						<div class="row">
                        @if('true'==CommonFunction::hasPermission('aircraft_notification',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Notification</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('aircraft/notification');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('aircraft_summary',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Aircraft Summary</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('aircraft/summary');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('aircraft_my_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>My Aircraft</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('aircraft/myAircraftList');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
						@if('true'==CommonFunction::hasPermission('airaft_admin_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>Air Craft List</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('aircraft/aircraftList');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('aircraft_add_new_aircraft',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua " >
                                <div class="inner">
                                    <h4 style='font-weight:bold;'>Add New Aircraft</h4>
                                    
                                </div>
                             
                              <a class="small-box-footer" href="{{URL::to('aircraft/new_aircraft');}}">
								Add New <i class="fa fa-arrow-circle-right"></i>
							</a>
                            </div>
                        </div><!-- ./col -->
                        @endif
                       
                         @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'report'))
                            <div class="col-md-4">
                                <!-- small box -->
                                <div class="small-box bg-aqua" >
                                    <div class="inner">
                                       <h4 style='font-weight:bold;'>Report</h4>
                                       
                                    </div>
                               
                                    <a class="small-box-footer"  href="{{URL::to('report/reportByModuel/aircraft');}}">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div><!-- ./col -->
                         @endif
                       
                    </div>
	</div>
	
</section>
@stop