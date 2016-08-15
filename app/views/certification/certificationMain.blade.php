@extends('layout')
@section('content')
<section class="content ">
<!--Instruction Start-->
 <?php 
$module='service_provider_certification';
$instructions=CommonFunction::getModuleInstructions($module);?>
  @include('commonInstruction')
  @yield('instruction')
<!--End Instruction-->
		<div class="row">
                      @if('true'==CommonFunction::hasPermission('sp_certification_management',Auth::user()->emp_id(),'access'))
                        <div class=" col-md-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Certification Management</h4>
                            </div>
                            
                            <a  class="small-box-footer" href="{{URL::to('certification/addPhase');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                       @endif
					   @if('true'==CommonFunction::hasPermission('sp_serviceprovider_certification',Auth::user()->emp_id(),'access'))
                        <div class="col-md-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Serviceprovider's Certification</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('certification/mycertification');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                       @endif
                       
                     @if('true'==CommonFunction::hasPermission('service_provider_certification',Auth::user()->emp_id(),'report'))
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-aqua" >
                                <div class="inner">
                                   <h4 style='font-weight:bold;'>Report</h4>
                                   
                                </div>
                           
                                <a class="small-box-footer"  href="{{URL::to('report/reportByModuel/service_provider_certification');}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                     @endif
        </div>
</section>
@stop