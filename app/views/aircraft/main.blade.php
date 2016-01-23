{{--
Page Description:
aircraft landing page, 
--}}
@extends('layout')
@section('content')

<section class='content' >

    <div class="row" style='margin:0px 0px 0px 0px;;'>
                      
						
						<div class="row">
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
                        @if('true'==CommonFunction::hasPermission('aircraft_report',Auth::user()->emp_id(),'report'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua " >
                                <div class="inner">
                                   <h4 style='font-weight:bold;'>Report</h4>
                                   
                                </div>
                           
                                <a class="small-box-footer" href="{{URL::to('aircraft/report')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        @endif
                       
                    </div>
	</div>
	
</section>
@stop