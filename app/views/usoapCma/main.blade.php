@extends('layout')
@section('content')
<div class="content">
	<div class="row">
                         @if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>New Protocal Question</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('usoap/newPQ');}}">
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
                                <h4 style='font-weight:bold;'>PQ List</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('usoap/pqList');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div> 
                        @endif

                        @if('true'==CommonFunction::hasPermission('sia_program_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-12 col-md-3 col-sm-4">
                            <!-- small box -->
                        <div class="small-box bg-aqua " >
                            <div class="inner">
                                <h4 style='font-weight:bold;'>Report</h4>
                            </div>
                            
                            <a class="small-box-footer" href="{{URL::to('#');}}">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                        </div>
                        @endif

		</div>

</div>
@stop