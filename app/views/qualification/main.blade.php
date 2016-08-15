@extends('layout')
@section('content')

<section class='content ' >
<!--Instruction Start-->
 <?php 
 $module='employee';
 $instructions=CommonFunction::getModuleInstructions($module);?>
  @include('commonInstruction')
  @yield('instruction')
<!--End Instruction-->
   
                      
						
						<div class="row">
					   
                    @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'access'))
                   
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'>
                                        Notifications
                                    </h4>
                                    
                                </div>
                               
                                <a class="small-box-footer" href="{{URL::to('qualification/notification');}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                       
                   
                    @endif	
                    @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'access'))
                   
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'>
                                        Employees List
                                    </h4>
                                    
                                </div>
                               
                                <a class="small-box-footer" href="{{URL::to('qualification/employees');}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                       
                   
                    @endif
                    @if('true'==CommonFunction::hasPermission('emp_summary',Auth::user()->emp_id(),'access'))
                   
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'>
                                        Employee Summary
                                    </h4>
                                    
                                </div>
                               
                                <a class="small-box-footer" href="{{URL::to('qualification/summary');}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                       
                   
                    @endif
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>Personal Info</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('qualification/personnel');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua " >
                                <div class="inner">
                                    <h4 style='font-weight:bold;'> Education</h4>
                                    
                                </div>
                              
                                <a class="small-box-footer" href="{{URL::to('qualification/education')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua " >
                                <div class="inner">
                                   <h4 style='font-weight:bold;'>Employment</h4>
                                   
                                </div>
                           
                                <a class="small-box-footer" href="{{URL::to('qualification/employment')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                   <h4 style='font-weight:bold;'>Professional Degree</h4>
                                 
                                </div>
                                
                                <a class="small-box-footer" href="{{URL::to('qualification/pro_degree')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                   
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'>
                                        Training/Workshop/OJT
                                    </h4>
                                   
                                </div>
                               
                                <a class="small-box-footer" href="{{URL::to('qualification/taining_work_ojt')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class="title">
                                       Language
                                    </h4>
                                  
                                </div>
                               
                                <a class="small-box-footer" href="{{URL::to('qualification/language')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'>
                                       CAA Technical Licence
                                    </h4>
                                    
                                </div>
                              
                                <a class="small-box-footer" href="{{URL::to('qualification/technical_licence')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'>
                                        CAA Aircraft Qualification
                                    </h4>
                                   
                                </div>
                                
                                <a class="small-box-footer" href="{{URL::to('qualification/aircraft_qualification')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'> 
                                       References
                                    </h4>
                                    <p>
                                        
                                    </p>
                                </div>
                                
                                <a class="small-box-footer" href="{{URL::to('qualification/reference')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'>
                                        Employee Assignments
                                    </h4>
                                </div>
                              
                                <a class="small-box-footer" href="{{URL::to('qualification/emp_verification')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'>
                                       Publication & Membership
                                    </h4>
                                    
                                </div>
                             
                                <a class="small-box-footer" href="{{URL::to('qualification/other')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'> 
                                            Comprehensive View 
                                    </h4>
                                   
                                </div>
                                
                                <a class="small-box-footer" href="{{URL::to('qualification/comp_view')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        @if('true'==CommonFunction::hasPermission('employee',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua ">
                                <div class="inner">
                                    <h4 class='title'> 
                                            Report
                                    </h4>
                                   
                                </div>
                                
                                <a class="small-box-footer" href="{{URL::to('report/reportByModuel/employee')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        @endif
                        
                    
	</div>

</section>
@stop