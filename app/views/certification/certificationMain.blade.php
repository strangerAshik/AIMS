@extends('layout')
@section('content')
<section class="content contentWidth">
		<div class="row">
                      {{--  @if('true'==CommonFunction::hasPermission('org_admin_list',Auth::user()->emp_id(),'access')) --}}
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Certification Management</h4>
                            </div>
                            
                            <a onclick="alert('Under Dev')" class="small-box-footer" href="{{URL::to('#');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                       {{--  @endif --}}
					  {{--  @if('true'==CommonFunction::hasPermission('org_admin_list',Auth::user()->emp_id(),'access')) --}}
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Serviceprovider Certification</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('certification/mycertification');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div><!-- ./col -->
                       {{--  @endif --}}
        </div>
</section>
@stop