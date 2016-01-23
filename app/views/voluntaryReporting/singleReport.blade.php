@extends('layout')

@section('content')
<section class="content contentWidth">
<!--Menu-->

@if('true'==CommonFunction::hasPermission('voluntary_reporting_action_details',Auth::user()->emp_id(),'access'))
	<p class="text-center col-md-6">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#action" >Action Details</button>    
	</p>
@endif
	
@if('true'==CommonFunction::hasPermission('voluntary_reporting_approval',Auth::user()->emp_id(),'access'))
	<p class="text-center col-md-6">
	    <button class="btn btn-primary btn-block " data-toggle="modal" data-target="#approvalForm" >Approval</button>	
	</p>
@endif

<!--Details of Reporting-->
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Reporting Details</h3>	
									<div class="man pull-right">-</div>								
									
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					<div class='disNon'>
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
				
				        <tbody>
				        @foreach ($reportInfo as $info)
						   <tr>
                               <th class="col-md-4">									
								Title
							  </th>
                                <td>
									{{$info->title}}
								</td>
						   </tr>
							<tr>
                               <th>									
								Date
							  </th>
                                <td>
									{{$info->created_at}}
								</td>
						   </tr>
						   <tr>
                               <th>									
								Email of Reporter
							  </th>
                                <td>
									{{$info->email}}
								</td>
						   </tr>
						   <tr>
						   		<th>									
						  		  Reporting Details
						 		 </th>
                               
                                <td>
									{{nl2br($info->report)}}
								</td>
							</tr>
							<tr>
								<th>
									Document
								 </th>
								<td>
									@if($info->file!='Null'){{HTML::link('files/voluntaryReporting/'.$info->file,'Document',array('target'=>'_blank'))}}
                                    @else
                                        {{HTML::link('#','No Document Provided')}}
                                    @endif
								</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
    </div>
<!--Action-->
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Action Details</h3>	
									<div class="man pull-right">-</div>								
									
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					
                    <table class="table table-bordered">
				     
				        <tbody>
				        @if($reportAction)
				        @foreach ($reportAction as $info)
				     
				        	<tr id="{{$reportId}}"><td colspan="4">
									
								<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('voluntary_reporting_action_details',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('voluntary_reporting_action',$info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								@if('true'==CommonFunction::hasPermission('voluntary_reporting_action_details',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('voluntary_reporting_action',$info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								@if('true'==CommonFunction::hasPermission('voluntary_reporting_action_details',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('BaseController@approve', '',array('voluntary_reporting_action',$info->id,$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('BaseController@notApprove', '',array('voluntary_reporting_action',$info->id,$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('voluntary_reporting_action_details',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('BaseController@removeWarning', '',array('voluntary_reporting_action',$info->id,$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('BaseController@warning', '',array('voluntary_reporting_action',$info->id,$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('voluntary_reporting_action_details',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#action{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>	

                    </td></tr>	
                  
						   <tr>
						   		<th class="col-md-4">									
						  		  Action Details
						 		 </th>
                               
                                <td>
									{{nl2br($info->action_details)}}
								</td>
							</tr>
							<tr>
								<th>
									Document
								 </th>
								<td>
									@if($info->file!='Null'){{HTML::link('files/voluntaryReporting/'.$info->file,'Document',array('target'=>'_blank'))}}
                                    @else
                                        {{HTML::link('#','No Document Provided')}}
                                    @endif
								</td>
                            </tr>
                            <tr>
                            	<th>Notification</th>
                            	<td>{{$info->notify}}</td>
                            </tr>
                            @endforeach
                            @else 
                            <tr>
                            	<td colspan="2">Action is not taken yet!!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
    </div>
<!--Approval-->
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Approval Details</h3>	
								
									<div class="man pull-right">-</div>								
									
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
						
                    <table class="table table-bordered">
						<tr><th>Approved By</th><th>Designation</th><th>Approval Date</th><th>Note</th></tr>
						@if($approvalInfo)
						@foreach($approvalInfo as $info)
					
					 	<tr id="{{$info->id}}"><td colspan="4">
									
								<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('voluntary_reporting_approval',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('voluntary_reporting_approval',$info->id,$info->approval_note), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								@if('true'==CommonFunction::hasPermission('voluntary_reporting_approval',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('voluntary_reporting_approval',$info->id,$info->approval_note), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								
								@if('true'==CommonFunction::hasPermission('voluntary_reporting_approval',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#approvalForm{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>	

                    </td></tr>	
                  
				      
				      
				      
						  <tr>
						  	<td>{{$info->approved_by}}</td><td>{{$info->designation}}</td><td>{{$info->approval_date}}</td><td>{{nl2br($info->approval_note)}}</td>
						  </tr>
						@endforeach
						@else 
						<tr>
						  	<td colspan="4">This Voluntary Report Action is not approved yet!</td>

					    </tr>
						@endif
                    
				    </table>
                    </div>
                    </div>
                    </div>
                  @include('common')
                  @yield('print')
    </div>
</section>

<!--Entry Form-->
@include('voluntaryReporting/entryForm')
@yield('approvalForm')
@yield('action')


@include('voluntaryReporting/editForm')
@yield('updateApprovalForm')
@yield('updateAction')

@stop