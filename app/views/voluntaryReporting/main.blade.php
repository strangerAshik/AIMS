@extends('layout')

@section('content')
<section class="content contentWidth">
<div class="row">
@if('true'==CommonFunction::hasPermission('voluntary_reporting',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>Voluntary Reporting List</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('voluntary/voluntaryReportingList');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        @endif
	
</div>
	
</section>
@stop