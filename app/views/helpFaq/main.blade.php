@extends('layout')

@section('content')
<section class='content ' >
<!--Instruction Start-->
 <?php 
$module='help_faq';
 $instructions=CommonFunction::getModuleInstructions($module);?>
  @include('commonInstruction')
  @yield('instruction')
<!--End Instruction-->
	<div class="row">
						@if('true'==CommonFunction::hasPermission('help_faq_ask_question',Auth::user()->emp_id(),'access'))
						
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
                        @if('true'==CommonFunction::hasPermission('help_faq_bank',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-xs-6 col-md-3 col-md-3">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>FAQ Bank</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('helpFaq/faqBank');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('help_faq',Auth::user()->emp_id(),'report'))
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-aqua" >
                                <div class="inner">
                                   <h4 style='font-weight:bold;'>Report</h4>
                                   
                                </div>
                           
                                <a class="small-box-footer"  href="{{URL::to('report/reportByModuel/help_faq');}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                     @endif
    </div>
</section>
@stop