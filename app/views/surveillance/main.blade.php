{{--
Page Description:
Action Entry landing page, 
--}}
@extends('layout')
@section('content')

<section class='content' >


						<div class="row">
                         @if('true'==CommonFunction::hasPermission('sia_board',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>SIA Board</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('surveillance/siaBoard');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div>
                        @endif
                         @if('true'==CommonFunction::hasPermission('my_sia',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Service Provider SIA</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('surveillance/mySia');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div>
                        @endif
                         @if('true'==CommonFunction::hasPermission('sia_inspector_associate_sia',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>My SIA</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('surveillance/singleInspectorSia');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div>
                        @endif
                         @if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Add New SIA Program</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('surveillance/newProgram');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div>
                        @endif

						@if('true'==CommonFunction::hasPermission('sia_today_task',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Today's Task-list  </h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('surveillance/todayTaskList');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div> 
                        @endif

                         @if('true'==CommonFunction::hasPermission('execute_sia_program',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Execute SIA Program</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('surveillance/newActionEnrty');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
                       
                        @if('true'==CommonFunction::hasPermission('sia_program_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>SIA Programs List (All)</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('surveillance/programList');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div>
                        @endif

                       

                        @if('true'==CommonFunction::hasPermission('executed_sia_programs',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Executed SIA Programs</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('surveillance/surveillanceList');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('sc_safety_concerns_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua " >
                                <div class="inner">
                                    <h4 style='font-weight:bold;'> Safety Concerns List</h4>
                                    
                                </div>
                              
                                <a class="small-box-footer" href="{{URL::to('safety/issuedList')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        @endif
            

                        @if('true'==CommonFunction::hasPermission('sia_central_search',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>SIA Central Search</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('surveillance/centralSearch');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        @endif

                     

                     @if('true'==CommonFunction::hasPermission('sia_report',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                            <div class="small-box bg-aqua" >
                                <div class="inner">
                                   <h4 style='font-weight:bold;'>Report</h4>
                                   
                                </div>
                           
                                <a class="small-box-footer"  href="{{URL::to('surveillance/report');}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                     @endif
                      
                       
                    </div>
                    <div>


	
</section>
@stop