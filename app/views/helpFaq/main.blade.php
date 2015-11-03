@extends('layout')

@section('content')
<section class='content widthController' >
	<div class="row">
						@if('true'==CommonFunction::hasPermission('airaft_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>Ask Question</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('helpFaq/askQuestion');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('airaft_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>Answered Question</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('helpFaq/answaredQuestionList');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('airaft_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>Pending Question</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('helpFaq/pendingQuestionList');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('airaft_list',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>Report</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('helpFaq/report');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        @endif
    </div>
</section>
@stop