{{--
Page Description:
Organization landing page, 
--}}
@extends('layout')
@section('content')

<section class='content' >
<div style='display:none'>
{{$role = Auth::user()->Role();}}
</div>
    <div class="row" style='margin:0px 0px 0px 0px;;'>
                      
						
						<div class="row">
						@if('true'==CommonFunction::hasPermission('org_admin_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Organization  List</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('organization/organizationList');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('org_my_org',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-red " >
							<div class="inner">
								<h4 style='font-weight:bold;'>My Organization(s)</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('organization/myOrganization');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('org_add_new',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-green " >
                                <div class="inner">
                                    <h4 style='font-weight:bold;'>Add New Organization</h4>
                                    
                                </div>
                             
                              <a class="small-box-footer" href="{{URL::to('organization/newOrganization');}}">
								Add New <i class="fa fa-arrow-circle-right"></i>
							</a>
                            </div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('org_report',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-yellow " >
                                <div class="inner">
                                   <h4 style='font-weight:bold;'>Report</h4>
                                   
                                </div>
                           
                                <a class="small-box-footer" href="{{--URL::to('organization/report')--}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        @endif
                       
                    </div>
	</div>
	
</section>
@stop