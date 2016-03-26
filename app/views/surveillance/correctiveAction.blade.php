@extends('layoutTable')
@section('content')
<section class="content widthController">
<!--Start academic Education-->
<script>
function window.onload() {
    window.location = "#{{$jump_to}}"
}
</script>
<div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Corrective Action</h3>

                                </div><!-- /.box-header -->
                                  
                                <div class="box-body">
								
								<div style="display:none">{{$num=0;}}</div>
								@foreach($findings as $info)								
									
                                    <table class="table table-bordered">
                                    
									<tbody>
									
									
                                   <tr id="{{$info->id}}">               
								<th colspan='2' style='color:#72C2E6'>Finding #{{++$num}}
								<span  class='hidden-print'>
									@if('true'==CommonFunction::hasPermission('sia_add_finding',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('sia_findings',$info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sia_add_finding',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('sia_findings', $info->id,$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
										
									
									 @if('true'==CommonFunction::hasPermission('sia_add_finding',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updateFindings{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
									 </span>

								</th>
								
						    </tr> 

                                      
                                        <tr>
                                           
                                            <td class="col-md-4">Finding Number</td>
                                            <td >{{$info->finding_number}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="col-md-4">Title</td>
                                            <td >{{$info->title}}</td>
                                        </tr>
                                      	
                                      	<tr>
                                           
                                            <td class="col-md-4">SIA Number</td>
                                            <td >{{$info->sia_number}}</td>
                                            
                                        </tr>

										<tr>
                                           
                                            <td>Finding</td>
                                            <td>{{$info->finding}}</td>
                                            
                                        </tr>
										<tr>
                                           
                                            <td>Target Date</td>
                                            <td>{{$info->target_date}}</td>
                                            
                                        </tr> 
										<tr>
                                            <td>Corrective Action Recommendation</td>
                                            <td>{{$info->corrective_action_plan}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Document</td>
                                            <td>
				                                @if($info->upload_file!='Null'){{HTML::link('files/sia_finding/'.$info->upload_file,'Document',array('target'=>'_blank'))}}
												@else
													{{HTML::link('#','No Document Provided')}}
												@endif
											</td>
                                        </tr>
                                        <tr>
									   		<td colspan="2">
									   			<i>Initialized By : {{$info->row_creator}} | 
									   			Initialized at : {{$info->created_at}} | 
									   			Last Updated By : {{$info->row_updator}} | 
									   			Updated at : {{$info->updated_at}}</i>
									   		</td>
									   		
									   	</tr>
                                        
                                        <?php $corrAct=CommonFunction::correctiveAction($info->finding_number)?>
										@if($corrAct)
										@foreach($corrAct as $corr)
										<tr>
                                           <th colspan='2' style='color:green'>Corrective Action Taken
                                          <span class='hidden-print'>
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_corrective_action',$corr->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_corrective_action', $corr->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
								@if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('sia_corrective_action',$corr->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('sia_corrective_action',$corr->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
									@if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'worning'))	
										{{ HTML::linkAction('AircraftController@removeWarning', '',array('sia_corrective_action',$corr->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
										{{ HTML::linkAction('AircraftController@warning', '',array('sia_corrective_action',$corr->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
										
									
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updateCorrectiveIssue{{$corr->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
									 </span>
								</th>
                                        </tr>
                    @if($corr->approve=='0')
					<tr>
						<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($corr)}}</th>	
					 </tr>
					 @endif
					 @if($corr->warning=='1')
					 <tr  >
					 <th colspan='2'>{{AircraftPrimaryInfo::warning($corr)}}	</th>
					 </tr>  
					 @endif
										<tr>
                                            <td>Corrective Action Plan</td>
                                            <td>{{$corr->currective_action}}</td>
                                        </tr>
										<tr>
                                            <td>CAP Initiated On</td>
                                            <td>{{$corr->revived_date}}</td>
                                        </tr>
										<tr>
                                            <td>Concern Authority Officer</td>
                                            <td>{{$corr->concern_authority_officer}}</td>
                                        </tr>
										<tr>
                                            <td>Regulation Mitigation</td>
                                            <td>{{$corr->regulation_mitigation}}</td>
                                        </tr>
										<tr>
                                            <td>Regulation Mitigation Date</td>
                                            <td>{{$corr->regulation_mitigation_date}}</td>
                                        </tr>
										<tr>
                                            <td>Document</td>
                                            <td>
				                                @if($corr->corrective_action_file!='Null'){{HTML::link('files/sia_corrective_action_file/'.$corr->corrective_action_file,'Document',array('target'=>'_blank'))}}
												@else
													{{HTML::link('#','No Document Provided')}}
												@endif
											</td>
                                        </tr>
                                        <tr>
									   		<td colspan="2">
									   			<i>Initialized By : {{$info->row_creator}} | 
									   			Initialized at : {{$info->created_at}} | 
									   			Last Updated By : {{$info->row_updator}} | 
									   			Updated at : {{$info->updated_at}}</i>
									   		</td>
									   		
									   	</tr>
                                        @endforeach
										@else
												<tr> <td colspan='2' style="color:red;text-align:center">Corrective Action Not Taken!!</td></tr>
											    @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'entry'))
												
													<tr> <td colspan='2' style="color:red;text-align:center"><button class="btn btn-primary" data-toggle="modal" data-target="#correctiveIssue{{$info->finding_number}}">Add Corrective Action</button></td></tr>
												@endif
										@endif
										
                                    </tbody></table>
									@endforeach
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                             @include('common')
                                    @yield('print')
</div>   

</section>
@include('surveillance.entryForm')
@yield('correctiveIssue')

@include('surveillance.editForm')
@yield('updateCorrectiveIssue')
@yield('updateFindings')
@stop