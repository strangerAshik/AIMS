@extends('layout')
@section('content')
<section class='content widthController'>

	<div class='row col-md-12 hidden-print'>
				@if('true'==CommonFunction::hasPermission('edp_legal_opinion',Auth::user()->emp_id(),'entry'))
				@if(!$legalOpinions)
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#legalOps">Opinion Of Legal Department</button>
				</p>
				@else
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#" disabled="">Opinion Of Legal Department</button>
				</p>
				@endif
				@endif
			@if(!$approvalInfos)
				@if('true'==CommonFunction::hasPermission('edp_approval',Auth::user()->emp_id(),'entry'))
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"   data-toggle="modal" data-target="#approvalForm">Approval</button>
				</p>
				@endif
			@else 
				@if('true'==CommonFunction::hasPermission('edp_approval',Auth::user()->emp_id(),'entry'))
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"  disabled="" data-toggle="modal" data-target="#">Approval</button>
				</p>
				@endif
			@endif
</div>
<!--EDP descripton-->
<div class="row" >
                      
                        <div class="col-md-12">
                           
                            <div class="box box-primary">
                            
							<div class="box-header">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >EDP Details</h3>
							@foreach ($edpDetails as $info) 
							<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('edp',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('edp_primary',$info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								@if('true'==CommonFunction::hasPermission('edp',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('edp_primary',$info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								@if('true'==CommonFunction::hasPermission('edp',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('BaseController@approve', '',array('edp_primary',$info->id,$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('BaseController@notApprove', '',array('edp_primary',$info->id,$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								
								@if('true'==CommonFunction::hasPermission('edp',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#updateEdp{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>				
									
							</div>							 
              
					
					<div class="box-body">
					<div class='disNon'>
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
				
					
            <tbody>
           
          
			   <tr><th class='col-md-4'>SIA / Tracking Number</th><td>{{$info->sia_number}}</td></tr>
			   <tr><th>Finding Number</th><td>{{$info->finding_number}}</td></tr>
			   <tr><th>SC Number</th><td>{{$info->sc_number}}</td></tr>
			   <tr><th>EDP Number</th><td>{{$info->edp_number}}</td></tr>
			   <tr><th>Title</th><td>{{$info->title}}</td></tr>
			   <tr><th>Severity Level</th><td>{{$info->severity_level}}</td></tr>
			   <tr><th>Explanation</th><td>{{$info->severity_explanation}}</td></tr>
			   <tr><th>Likelihood Level</th><td>{{$info->likelihood_level}}</td></tr>
			   <tr><th>Explanation</th><td>{{$info->likelihood_explanation}}</td></tr>
			   <tr><th>Level Of Risk Selected</th><td>{{$info->level_of_risk}}</td></tr>
			   <tr><th>Type Of Action Selected</th><td>
							
									@if($action=CommonFunction::updateMultiSelection('edp_primary', 'id',$info->id,'type_of_action'))
											  @if($action!=null)
												@foreach($action as $key=>$value)
													{{$value}},
												@endforeach
												  
											  @else 
											 No Action Selected
											  @endif
									 @else 
											 No Action Selected
									@endif
								
			   </td></tr>
			   <tr><th>Has Deviation/Exemption Procedure?</th><td>{{$info->deviation_procedure}}</td></tr>
			   <tr><th>If Yes Explain(Deviation/Exemption Procedure)</th><td>{{$info->if_yes_explain_deviation_procedure}}</td></tr>
			   <tr><th>Remedial Action</th><td>{{$info->remedial_action}}</td></tr>
			   <tr><th>Written Explanation For Admin Action</th><td>{{$info->written_explanation}}</td></tr>
			   <tr><th>Recommendation For Legal Enforcement (If Appropriate)</th><td>{{$info->recommendation_for_legal_enf}}</td></tr>
			   <tr><th>EDP Process Outcome Requested</th><td>{{$info->edp_peocess_outcome_requested}}</td></tr>
			   <tr><th>If Yes Explain & Justification</th><td>{{$info->if_yes_explain_outcome_requested}}</td></tr>
			   <tr><th>Remedial Measure</th><td>{{$info->remedial_measure}}</td></tr>
			   <tr><th>Enforcement Decision Outcome</th><td>{{$info->enforcement_decision_outcome}}</td></tr>
			
			   <tr><th>Enforcement Action</th><td>{{$info->enforcement_action}}</td></tr>
			  
			   <tr><th>Document(Enforcement Action)</th><td>
				@if($info->enforcement_action_file!='Null'){{HTML::link('files/edp_enforcement_action_file/'.$info->enforcement_action_file,'Document',array('target'=>'_blank'))}}
								@else
									{{HTML::link('#','No Document Provided')}}
								@endif
			   </td></tr>
			 
			   <tr><th>Admin Opinion</th><td>{{$info->admin_opinion}}</td></tr>
			   <tr><th>Document(Admin Opinion)</th><td>
				@if($info->admin_opinion_file!='Null'){{HTML::link('files/edp_legal_admin_opinion_file/'.$info->admin_opinion_file,'Document',array('target'=>'_blank'))}}
								@else
									{{HTML::link('#','No Document Provided')}}
								@endif
			   </td></tr>  
			  
			   <tr><th>Legal Opinion</th><td>{{$info->legal_opinion}}</td></tr>
			   <tr><th>Document(Legal Opinion)</th><td>
				@if($info->legal_opinion_file!='Null'){{HTML::link('files/edp_legal_admin_opinion_file/'.$info->legal_opinion_file,'Document',array('target'=>'_blank'))}}
								@else
									{{HTML::link('#','No Document Provided')}}
								@endif
			   </td></tr>
			   
				 <tr>
						   		<td colspan="2">
						   			<i>Initialized By : {{$info->row_creator}} | 
						   			Initialized at : {{$info->created_at}} | 
						   			Last Updated By : {{$info->row_updator}} | 
						   			Updated at : {{$info->updated_at}}</i>
						   		</td>
				</tr>
			
			</tbody>
					 
					 
					
					 
					</table>
					</div>
		@endforeach
						</div>
					</div>
					
 
<!--Legal Opinion-->
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Legal Opinion</h3>									
									
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					<div class='disNon'>
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
					@if($legalOpinions)
					@foreach($legalOpinions as $opinion)
                        <tbody>
						    <tr>               
								<th colspan='2' style='color:#72C2E6'>Legal Opinion #{{++$num}}
								<span class='hidden-print'>
									 @if('true'==CommonFunction::hasPermission('edp_legal_opinion',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('edp_legal_opinion',$opinion->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('edp_legal_opinion',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('edp_legal_opinion',$opinion->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									@if('true'==CommonFunction::hasPermission('edp_legal_opinion',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updatelegalOpenion{{$opinion->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</span>
								</th>
								
						    </tr>        
							<tr>
                                <th>									
									Legal Opinion
								</th>
                                <td>{{$opinion->legal_openion}}</td>
                            </tr>
                             <tr><th>Document</th><td>
                             <?php $docs=CommonFunction::documentInfo('edp_legal_opinion',$opinion->id)?>
								@if($docs!='Null'){{HTML::link('files/documents/'.$docs,'Document',array('target'=>'_blank'))}}
								@else
									{{HTML::link('#','No Document Provided')}}
								@endif
			   </td></tr>
							<tr>
                                <th>									
									Author Of Legal Opinion
								</th>
                                <td>{{$opinion->row_creator}}</td>
                            </tr>
							<tr>
                                <th>									
									Given at [Date and Time]
								</th>
                                <td>{{$opinion->created_at}}</td>
                            </tr>
							 <tr>
						   		<td colspan="2">
						   			<i>Initialized By : {{$opinion->row_creator}} | 
						   			Initialized at : {{$opinion->created_at}} | 
						   			Last Updated By : {{$opinion->row_updator}} | 
						   			Updated at : {{$opinion->updated_at}}</i>
						   		</td>
							</tr>
						</tbody>
					 @endforeach
					 @else
						 <tbody>
							<tr>
								<td colspan='2'>
								No Legal Opinion Written Yet!!
								</td>
							</tr>
						 </tbody>
					 @endif
					 
					</table>
					</div>
						</div>
					</div>
					
	</div>
<!--Approval -->
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                          
                            <div class="box box-primary">
							<div class="box-header">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Approval Information</h3>									
									
							</div>							 
              
					
					<div class="box-body">
					<div class='disNon'>
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
					@if($approvalInfos)
					@foreach($approvalInfos as $info)
                        <tbody>
						    <tr>               
								<th colspan='2' style='color:#72C2E6'>Approval Info. #{{++$num}}
								<span class='hidden-print'>

									 @if('true'==CommonFunction::hasPermission('edp_approval',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('edp_approval',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('edp_approval',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('edp_approval',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									@if('true'==CommonFunction::hasPermission('edp_approval',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updateApprovalInfos{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</span>
								</th>
								
						    </tr>        
							<tr>
                                <th>									
									Approved By
								</th>
                                <td>{{$info->approved_by}}</td>
                            </tr>
							<tr>
                                <th>									
									Designation
								</th>
                                <td>{{$info->designation}}</td>
                            </tr>
							<tr>
                                <th>									
									Approval Date
								</th>
                                <td>{{$info->approval_date}}</td>
                            </tr>
                            
                            <tr>
                                <th>Approval Note</th>
                                <td>{{$info->approval_note}}</td>
                            </tr>
                          
						</tbody>
					 @endforeach
					 @else
						 <tbody>
							<tr>
								<td colspan='2'>
								Not Approved Yet!!
								</td>
							</tr>
						 </tbody>
					 @endif
					 
					</table>
					</div>
						</div>
					</div>
			 @include('common')
            @yield('print') 	
	</div>
@include('edp.entryForm')
@yield('legalOps')
@yield('approvalForm')

@include('edp.editForm')
@yield('updateLegalOps')
@yield('updateApprovalForm')
@yield('updateEdp')
</section>
@stop