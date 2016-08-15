{{--
Page Description:
Library Main page, 
1. Supporting Docs info.
--}}
@extends('layout')
@section('content')

<section class='content' >

<!--Instruction Start-->
 <?php 
$module='e_library';
 $instructions=CommonFunction::getModuleInstructions($module);?>
  @include('commonInstruction')
  @yield('instruction')
<!--End Instruction-->

    <div class="row" style='margin:0px 0px 0px 0px;;'>
                      
						
						<div class="row">
					@if('true'==CommonFunction::hasPermission('library_add_new_supporitng_docs',Auth::user()->emp_id(),'access'))	

                        <div class="col-md-4">
                            <!-- small box -->
						<div class="small-box bg-aqua " >
							<div class="inner">
								<h4 style='font-weight:bold;'>Add Document</h4>
							</div>
							
							<a class="small-box-footer" href="{{URL::to('library/newSupportingDocuments');}}">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
                        </div><!-- ./col -->
                    @endif
						@if('true'==CommonFunction::hasPermission('library_supporting_docs',Auth::user()->emp_id(),'access'))
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-aqua " >
                                <div class="inner">
                                    <h4 style='font-weight:bold;'>Document List</h4>
                                    
                                </div>
                             
                              <a class="small-box-footer" href="{{URL::to('library/privateView');}}">
								Add New <i class="fa fa-arrow-circle-right"></i>
							</a>
                            </div>
                        </div><!-- ./col -->
                        @endif
                        @if('true'==CommonFunction::hasPermission('e_library',Auth::user()->emp_id(),'access'))
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-aqua " >
                                <div class="inner">
                                   <h4 style='font-weight:bold;'>Report</h4>
                                   
                                </div>
                           
                                <a class="small-box-footer" href="{{URL::to('report/reportByModuel/e_library')}}">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        @endif
                       
                    </div>
	</div>
	
</section>
@stop