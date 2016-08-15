@extends('layout')
@section('content')
<style>
.inner a h4{color: #FFF}
</style>
<section class='content' >
<!--Instruction Start-->
 <?php
$module='dashboard_main';
 $instructions=CommonFunction::getModuleInstructions($module);?>
  @include('commonInstruction')
  @yield('instruction')
<!--End Instruction-->

    <div class="row" style='margin:0px 0px 0px 0px;;'>
                      
						
						<div class="row">

                        @if('true'==CommonFunction::hasPermission('notifications',Auth::user()->emp_id(),'access'))
                            <div class="col-lg-3 col-xs-6 col-md-3 disNon">
                                <!-- small box -->
                                <div class="small-box bg-aqua  height">
                                    <div class="inner">
                                        <a class="small-box-footer"  href="#" onclick="alert('Sorry!! This Module is Under Development.')"><h4 class='title'>
                                            Notifications
                                        </h4></a>                                    
                                    </div>
                                    <div class="icon">
                                     <a class="small-box-footer" href="#" onclick="alert('Sorry!! This Module is Under Development.')">
                                        <i class="ion ion-ios7-alarm-outline"></i>
                                    </a>
                                    </div>
                                    <a class="small-box-footer" href="#" onclick="alert('Sorry!! This Module is Under Development.')">
                                       <!-- More info--> <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div><!-- ./col -->
                        @endif

						@if('true'==CommonFunction::hasPermission('sia',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-blue  height" >
							<div    class="inner">
								<a  class="small-box-footer" href="{{'surveillance/main'}}"><h4 style='font-weight:bold; color:#fff; z-index:99999'>Surveillance, Inspection & Audit (SIA) & RSC (CE-7,8)</h4></a>
							</div>
							<div class="icon">
                                <a class="small-box-footer" href="{{'surveillance/main'}}">
    								<i  class="icon ion-arrow-expand"></i>
                                </a>
							</div>
							<a class="small-box-footer" href="{{'surveillance/main'}}">
							 <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
						@endif
						
						@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-blue  height" >
                                <div class="inner">
                                <a class="small-box-footer" href="{{'aircraft/main'}}">
                                   <h4 style='font-weight:bold;'>Aircraft</h4>
                                </a>
                                   
                                </div>
                                <div class="icon">
                                    <a class="small-box-footer" href="{{'aircraft/main'}}">
                                        <i class="icon ion-plane"></i>
                                    </a>
                                </div>
                                <a class="small-box-footer" href="{{'aircraft/main'}}">
                                <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						@endif
						@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-blue height">
                                <div class="inner">
                                   <h4 style='font-weight:bold;'>Organization</h4>
                                 
                                </div>
                                <div class="icon">
                                    <i class="icon ion-briefcase"></i>
                                </div>
                                
                                <a class="small-box-footer" href="{{'organization/main'}}">
                                     <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						@endif
                    
					@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                    <h4 class='title'>
                                    Personnel Licensing
                                    </h4>
                                   
                                </div>
                                <div class="icon">
                                    <i class="icon ion-key"></i>
                                </div>
                                
                                <a class="small-box-footer" href="{{'pel/main'}}">
                                     <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						@endif
						@if('true'==CommonFunction::hasPermission('service_provider_certification',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-blue height">
                                <div class="inner">
                                    <h4 class='title'>
                                         Certification (CE-6)
                                    </h4>
                                    
                                </div>
                                <div class="icon">
                                    <i class="icon ion-pricetags"></i>
                                </div>
                                <a class="small-box-footer" href="{{'certification/certificationMain'}}">
                                     <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                 
                            </div>
                        </div><!-- ./col -->
						@endif
						@if('true'==CommonFunction::hasPermission('employee',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-blue  height">
                                <div class="inner">
                                 <a href="{{URL::to('qualification/main');}}">    
                                    <h4 class='title'>
                                        Employee
                                    </h4>
                                </a>
                                   
                                </div>
                                <div class="icon">
                                   <a href="{{URL::to('qualification/main');}}"> <i class="icon ion-person-stalker"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{URL::to('qualification/main');}}">
                                     <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						@endif
                        @if('true'==CommonFunction::hasPermission('its ',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-blue  height">
                                <div class="inner">
                                <a href="{{URL::to('itsOjt/main');}}">
                                    <h4 class='title'>
                                       ITS (CE-4)
                                    </h4>
                                </a>
                                   
                                </div>
                                <div class="icon">
                                   <a href="{{URL::to('itsOjt/main');}}"> <i class="fa fa-briefcase"></i></a>
                                </div>
                                
                                <a class="small-box-footer" href="{{URL::to('itsOjt/main');}}">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        @endif
                    
                    @if('true'==CommonFunction::hasPermission('ans_aga_aerodrome_inspection ',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                    <h4 class='title'> 
                                        ANS/AGA/Aerodrome Inspection
                                    </h4>
                                    <p>
                                        
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer" href="#" onclick="alert('Sorry!! This Module is Under Development.')">
                                    <!-- More info --> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        @endif    
					@if('true'==CommonFunction::hasPermission('ans_aga_aerodrome_inspection ',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                    <h4 class='title'> 
                                        State Letters
                                    </h4>
                                    <p>
                                        
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer" href="#" onclick="alert('Sorry!! This Module is Under Development.')">
                                    <!-- More info --> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						@endif
                    @if('true'==CommonFunction::hasPermission('environment ',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                    <h4 class='title'>
                                        Environment 
                                    </h4>
                                </div>
                                <div class="icon">
                                   <span class="glyphicons glyphicons-snowflake">❄</span>
                                </div>
                                <a class="small-box-footer" href="#" onclick="alert('Sorry!! This Module is Under Development.')">
                                    <!-- More info --> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    @endif
						@if('true'==CommonFunction::hasPermission('wild_life_strike ',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                    <h4 class='title'>
                                        Wild Life Strike
                                    </h4>
                                    
                                </div>
                                <div class="icon">
                                    <i class="icon ion-alert"></i>
                                </div>
                                <a class="small-box-footer" href="#" onclick="alert('Sorry!! This Module is Under Development.')">
                                    <!-- More info --> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						@endif
						@if('true'==CommonFunction::hasPermission('accident_&_incident_investigation',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                    <h4 class='title'> 
											Accident & Incident Investigation 
                                    </h4>
                                   
                                </div>
                                <div class="icon">
                                    <i class="icon ion-ios7-compose"></i>
                                </div>
                                <a class="small-box-footer" href="#" onclick="alert('Sorry!! This Module is Under Development.')">
                                    <!-- More info --> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						@endif

                   
					@if('true'==CommonFunction::hasPermission('e_library',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-blue  height">
                                <div class="inner">
                                 <a class="small-box-footer" href="{{URL::to('library/main');}}">
                                    <h4 class='title'>
                                         E-Library (CE-1,2,3,5)
                                    </h4>
                                </a>
                                    
                                </div>
                                <div class="icon">
                                    <a class="small-box-footer" href="{{URL::to('library/main');}}">
                                    <i class="icon ion-document-text"></i>
                                    </a>
                                </div>
                                <a class="small-box-footer" href="{{URL::to('library/main');}}">
                                     <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
					@endif
					
                        
                    
                    @if('true'==CommonFunction::hasPermission('report ',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                    <h4 class='title'>
                                        SMS & SSP
                                    </h4>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                
                                <a class="small-box-footer" href="#" onclick="alert('Sorry!! This Module is Under Development.')">
                                   <!--  More info  --><i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    @endif
                  @if('true'==CommonFunction::hasPermission('report ',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                    <h4 class='title'>
                                        USOAP-CMA
                                    </h4>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a class="small-box-footer" href="{{'usoap/main'}}">
                                    <!-- More info --> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    @endif
                    @if('true'==CommonFunction::hasPermission('report ',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 ">
                            <!-- small box -->
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                    <h4 class='title'>
                                        Aviation Security
                                    </h4>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-eye"></i>
                                </div>
                                <a class="small-box-footer" href="#" onclick="alert('Sorry!! This Module is Under Development.')">
                                    <!-- More info --> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    @endif
                     @if('true'==CommonFunction::hasPermission('report ',Auth::user()->emp_id(),'access'))
                            <div class="col-lg-3 col-xs-6 col-md-3 disNon">
                                <!-- small box -->
                                <div class="small-box bg-blue  height">
                                    <div class="inner">
                                       <a class="small-box-footer" href="report/report">
                                        <h4 class='title'>
                                            Report
                                        </h4>
                                        </a>
                                    </div>
                                    <div class="icon">
                                    <a class="small-box-footer" href="report/report">
                                        <i class="icon ion-clipboard"></i>
                                    </a>
                                    </div>
                                    
                                    <a class="small-box-footer" href="report/report">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div><!-- ./col -->
                    @endif

                    @if('true'==CommonFunction::hasPermission('voluntary_reporting',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-blue  height">
                                <div class="inner">
                                 <a class="small-box-footer" href="{{'voluntary/main'}}">
                                    <h4 class='title'>
                                        Voluntary & Mandatory Reporting
                                    </h4>   
                                </a>                                 
                                </div>
                                <div class="icon">
                                 <a class="small-box-footer" href="{{'voluntary/main'}}">
                                    <i class="icon ion-android-friends"></i>
                                </a>
                                </div>
                                
                                <a class="small-box-footer" href="{{'voluntary/main'}}">
                                     <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    @endif
                    @if('true'==CommonFunction::hasPermission('help_faq',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-blue  height">
                                <div class="inner">
                                 <a class="small-box-footer" href="{{'helpFaq/main'}}">
                                    <h4 class='title'>
                                        Help & FAQ
                                    </h4>      
                                </a>                              
                                </div>
                                <div class="icon">
                                <a class="small-box-footer" href="{{'helpFaq/main'}}">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                                </div>
                                 
                                <a class="small-box-footer" href="{{'helpFaq/main'}}">
                                     <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    @endif
                    @if('true'==CommonFunction::hasPermission('settings',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-blue  height">
                                <div class="inner">
                                 <a class="small-box-footer" href="{{'settings'}}">
                                    <h4 class='title'>
                                        Settings
                                    </h4>     
                                </a>                               
                                </div>
                                <div class="icon">
                                <a class="small-box-footer" href="{{'settings'}}">
                                    <i class="icon ion-ios7-gear"></i>
                                </a>
                                </div>
                                
                                <a class="small-box-footer" href="{{'settings'}}">
                                     <i class="fa fa-arrow-circle-right"></i>
                                </a>
                               
                            </div>
                        </div><!-- ./col -->
                    @endif

						
                    </div>
	</div>
	
 

<!--Password Change Check -->
@if(Auth::User()->PassChange()!='1')

	<style>
.modal-headerontest {
    padding:9px 15px;
    border-bottom:1px solid #FCD209;
    background-color: #FCD209;
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
               aria-hidden="true">
            </button>
            <h4 class="modal-title" id="myModalLabel">
              Change Your Default Password
            </h4>
         </div>
         <div class="modal-body ">
           <h4> <p>Please Change Your Default Password For Security purpose.</br>
           For changing password follow the steps<br>
           1.Go to settings<br>
           2.Go to My Profile<br>
           3.Click On Change Password<br><br>

            Thanks</p></h4>
		  
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
<!--End ON TEST MODAL-->

	
@endif
</section>
@stop