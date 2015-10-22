@extends('layout')
@section('content')
<section class="content widthController">

<span style='display:none'>
{{$role=Auth::User()->Role()}}
</span>
@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'entry'))	
@include('organization.menu')
@yield('orgMenuDetails')
@endif

<div class="row" >
                        
		 
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title"> Organization Primary Information</h3>
							  </div>							
							  <div class='col-md-6'>
							  
							  </div>
					  @foreach($orgPrimary as $primary)
					<div class="box-body">
					
                    <table class="table table-bordered">
                        <tbody>
							 
							<tr>
							<th colspan='2'>
								 <span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_primary',$primary->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_primary',$primary->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('org_primary',$primary->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_primary',$primary->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_primary',$primary->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_primary',$primary->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#orgPrimaryUpdate{{$primary->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
							     
							  </span>
							  </th>
							  </tr>
				
				
                           @if($primary->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($primary)}}</th>	
						 </tr>
						 @endif
						 @if($primary->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($primary)}}	</th>
						 </tr>  
						 @endif
                            <tr>
                                <td class="col-md-3">									
									Organization Number
								</td>
                                <td>{{$primary->org_number}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">									
									Organization Name
								</td>
                                <td>{{$primary->org_name}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">									
									Organization Type
								</td>
                                <td>{{$primary->org_type}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">									
									Active
								</td>
                                <td>{{$primary->active}}</td>
                            </tr>
                        
                        </tbody>
                    </table>

				</div>
				@endforeach	
               	</div>
                <!-- /.box-body -->
                               
                            </div>
						</div>

	
<!-- Business Name-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Organization Business Name</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if ($org_business_name)
					 @foreach($org_business_name as $name)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Business Name #{{++$num}}  
								 <span class='hidden-print'>
                                   @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_business_name',$name->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
									@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_business_name',$name->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								  @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_business_name',$name->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_business_name',$name->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_business_name',$name->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_business_name',$name->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgbusinessNameUpdate{{$name->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($name->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($name)}}</th>	
						 </tr>
						 @endif
						 @if($name->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($name)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$name->active}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					
								Business Name
							</td>
							<td>{{$name->org_business_name}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Effective Date
							</td>
							<td>{{$name->org_effective_date.' '.$name->org_effective_month.' '.$name->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Note
							</td>
							<td>{{$name->org_business_name_note}}  </td>
						</tr>
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
										<div class="box-body">					
					                    <table class="table table-bordered">
														 
										   <tbody>	                        
											 <tr>
											 	<td> No Data Is Provided Yet!!</td>
											 </tr>
											 </tbody>
										</table>
										</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End Business Name-->

<!--Organization Certificates-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Organization Certificates</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_certificates)
					 @foreach($org_certificates as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Certificate #{{++$num}}  
								 <span class='hidden-print'>
                                  @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_certificates',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_certificates',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								 @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_certificates',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_certificates',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_certificates',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_certificates',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgCertificateUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					
								Certificate Type
							</td>
							<td>{{$item->org_certificate_type}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Issued Date
							</td>
							<td>{{$item->org_issued_date.' '.$item->org_issued_month.' '.$item->org_issued_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Expiration Date
							</td>
							<td>{{$item->org_expiration_date.' '.$item->org_expiration_month.' '.$item->org_expiration_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Control Number
							</td>
							<td>{{$item->org_control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Basis & Note
							</td>
							<td>{{$item->org_basis_note}}  </td>
						</tr>
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End Organization Certificates-->
<!--Organization Financial status-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Organization Financial Status</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_financial_status)
					 @foreach($org_financial_status as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Financial Status #{{++$num}}  
								 <span class='hidden-print'>
                                  @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_financial_status',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_financial_status',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								 @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_financial_status',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_financial_status',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_financial_status',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_financial_status',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgFinanCilaStatusUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Effective Date
							</td>
							<td>{{$item->effective_date}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					
								Paid Up Capital
							</td>
							<td>{{$item->paid_up_capital}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Authorized Capital
							</td>
							<td>{{$item->authorized_capital}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Asset During Last Audit
							</td>
							<td>{{$item->asset_during_last_audit}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								License Fee( CAAB Charge)
							</td>
							<td>{{$item->caab_charges_License_fee}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Renewal Fee
							</td>
							<td>{{$item->caab_charges_renewal_fee}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Outstanding Charge
							</td>
							<td>{{$item->outstanding_charge}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					
								Aeronautical Charge
							</td>
							<td>{{$item->aeronautical_charge}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Non-aeronautical Charge
							</td>
							<td>{{$item->nonaeronautical_charge}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Review Date
							</td>
							<td>{{$item->review_date}}  </td>
						</tr>
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End -Organization Financial status-->

<!--Organization Operations Specifications-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Operations Specifications</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_operations_specifications)
					 @foreach($org_operations_specifications as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Ops Specs#{{++$num}}  
								 <span class='hidden-print'>
                                  @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_operations_specifications',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_operations_specifications',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								 @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_operations_specifications',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_operations_specifications',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_operations_specifications',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_operations_specifications',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgOpsSpcsUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Issue Date
							</td>
							<td>{{$item->isuue_date}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					
								Aircraft Model
							</td>
							<td>{{$item->aircraft_model}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Registration Mark
							</td>
							<td>{{$item->registration_mark}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Type/Class Of Operation
							</td>
							<td>{{$item->type_class_of_ops}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Category
							</td>
							<td>{{$item->category}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Area(s) Of Operation
							</td>
							<td>{{$item->area_of_operation}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Special Limitations
							</td>
							<td>{{$item->special_limitations}}  </td>
						</tr>
						<tr>
							<td class="col-md-3" colspan="2">		
								Special Authorizations Section

							</td>
							
						</tr>


						
						<tr>
							<td class="col-md-3">					Dangerous Goods
							</td>
							<td>{{$item->dangerous_goods}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Specific Approvals(DG)
							</td>
							<td>{{$item->dangerous_goods_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(DG)
							</td>
							<td>{{$item->dangerous_goods_remarks}}  </td>
						</tr>



						<tr>
							<td class="col-md-3">					Low Visibility Operations
							</td>
							<td>{{$item->low_visibility_operations}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Specific Approvals(LVO)
							</td>
							<td>{{$item->low_visibility_operations_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(LVO)
							</td>
							<td>{{$item->low_visibility_operations_remarks}}  </td>
						</tr>


						<tr>
							<td class="col-md-3">					Approach And Landing
							</td>
							<td>{{$item->approach_and_landing}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Specific Approvals(LVO)
							</td>
							<td>{{$item->approach_and_landing_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(LVO)
							</td>
							<td>{{$item->approach_and_landing_remarks}}  </td>
						</tr>


						<tr>
							<td class="col-md-3">					Take Off
							</td>
							<td>{{$item->take_off}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Specific Approvals(TO)
							</td>
							<td>{{$item->take_off_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(TO)
							</td>
							<td>{{$item->take_off_remarks}}  </td>
						</tr>
						


						<tr>
							<td class="col-md-3">					RVSM
							</td>
							<td>{{$item->rvsm}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Specific Approvals(RVSM)
							</td>
							<td>{{$item->rvsm_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(RVSM)
							</td>
							<td>{{$item->rvsm_remarks}}  </td>
						</tr>

						<tr>
							<td class="col-md-3">					ETOPS
							</td>
							<td>{{$item->etops}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Specific Approvals(ETOPS)
							</td>
							<td>{{$item->etops_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(ETOPS)
							</td>
							<td>{{$item->etops_remarks}}  </td>
						</tr>


						<tr>
							<td class="col-md-3">					MNPS
							</td>
							<td>{{$item->mnps}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Specific Approvals(MNPS)
							</td>
							<td>{{$item->mnps_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(MNPS)
							</td>
							<td>{{$item->mnps_remarks}}  </td>
						</tr>
						

						<tr>
							<td class="col-md-3">					Navigation Specification For PBN Operations
							</td>
							<td>{{$item->navigation_specification_for_pbn_ops}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Specific Approvals(PBN)
							</td>
							<td>{{$item->navigation_specification_for_pbn_ops_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(PBN)
							</td>
							<td>{{$item->navigation_specification_for_pbn_ops_remarks}}  </td>
						</tr>



						<tr>
							<td class="col-md-3">					Continuing Airworthiness
							</td>
							<td>{{$item->continuing_airworthiness}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Specific Approvals(CA)
							</td>
							<td>{{$item->continuing_airworthiness_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(CA)
							</td>
							<td>{{$item->continuing_airworthiness_remarks}}  </td>
						</tr>



						<tr>
							<td class="col-md-3">					Other
							</td>
							<td>{{$item->other}}  </td>
						</tr>
					
						<tr>
							<td class="col-md-3">					Specific Approvals(Other)
							</td>
							<td>{{$item->other_sa}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Remarks(Other)
							</td>
							<td>{{$item->other_remarks}}  </td>
						</tr>
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End -Organization Financial status-->

<!--Organization Base Location-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Organization Base Location</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_base_location)
					 @foreach($org_base_location as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Base Location #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_base_location',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_base_location',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_base_location',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_base_location',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_base_location',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_base_location',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgBaseLocationUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">					
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Location Type
							</td>
							<td>{{$item->org_location_type}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Contact Person
							</td>
							<td>{{$item->contract_person}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Telephone Number
							</td>
							<td>{{$item->org_telephone_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Fax Number
							</td>
							<td>{{$item->org_fax_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Location
							</td>
							<td>{{$item->org_lecation}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Address
							</td>
							<td>{{$item->org_address}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								City
							</td>
							<td>{{$item->org_city}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								State/Provision
							</td>
							<td>{{$item->org_state_province}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Postal Code
							</td>
							<td>{{$item->org_postal_code}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Country
							</td>
							<td>{{$item->org_country}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Memo/Note
							</td>
							<td>{{$item->memo_note}}  </td>
						</tr>
						
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End Organization Base Location-->
<!--Organization  AOC Certificate-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">AOC Certificate</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_aoc_certificate)
					 @foreach($org_aoc_certificate as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>AOC Certificate #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_aoc_certificate',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_aoc_certificate',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_aoc_certificate',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_aoc_certificate',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_aoc_certificate',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_aoc_certificate',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgAocCertificateUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">					
								Certificate Type
							</td>
							<td>{{$item->aoc_certificate_type}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								AOC No.
							</td>
							<td>{{$item->aoc_no}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Certify By
							</td>
							<td>{{$item->certify_by}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Certificate For
							</td>
							<td>{{$item->certificate_for}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Points Of Contact Name And Address
							</td>
							<td>{{$item->points_of_contact_name_address}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Issued Date
							</td>
							<td>{{$item->issued_date}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								Date Of Expiry
							</td>
							<td>{{$item->expiration_date}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Initial Issued Date
							</td>
							<td>{{$item->initial_issued_date}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Certificate Issued By
							</td>
							<td>{{$item->certificate_issued_by}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Remarks
							</td>
							<td>{{$item->remarks}}  </td>
						</tr>
						
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End  AOC Certificate-->
<!--Organization Management Contacts-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Stakeholder Contact</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_management_contacts)
					 @foreach($org_management_contacts as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Management Contact #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_management_contacts',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	

									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_management_contacts',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								 @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_management_contacts',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_management_contacts',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								 @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_management_contacts',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_management_contacts',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								 @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgManagementContactsUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Management Position
							</td>
							<td>{{$item->management_position}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					First Name
							</td>
							<td>{{$item->first_name}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Last Name
							</td>
							<td>{{$item->last_name}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								Actual Title
							</td>
							<td>{{$item->actual_title}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Work Phone
							</td>
							<td>{{$item->work_phone}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								Cell Number 
							</td>
							<td>{{$item->cell_number}}  </td>
						</tr>
						<tr>
						<tr>
							<td class="col-md-3">				
								Fax Number 
							</td>
							<td>{{$item->fax_number}}  </td>
						</tr>
						<tr>
						<tr>
							<td class="col-md-3">				
								Location 
							</td>
							<td>{{$item->location}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								Email 
							</td>
							<td>{{$item->email}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								Address 
							</td>
							<td>{{$item->address}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								City
							</td>
							<td>{{$item->city}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								State/Provision
							</td>
							<td>{{$item->state_province}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Postal Code
							</td>
							<td>{{$item->postal_code}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Country
							</td>
							<td>{{$item->country}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Memo/Note
							</td>
							<td>{{$item->memo_note}}  </td>
						</tr>
						
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
										<div class="box-body">					
					                    <table class="table table-bordered">
														 
										   <tbody>	                        
											 <tr>
											 	<td> No Data Is Provided Yet!!</td>
											 </tr>
											 </tbody>
										</table>
										</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End Organization Management Contacts-->
<!--Organization CAA Contacts-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">CAA Contacts</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_caa_contacts)
					 @foreach($org_caa_contacts as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Management Contact #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_caa_contacts',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_caa_contacts',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
                                @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_caa_contacts',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_caa_contacts',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_caa_contacts',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_caa_contacts',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								 @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgCAAContactsUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">					
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Inspector Position
							</td>
							<td>{{$item->inspector_position}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					First Name
							</td>
							<td>{{$item->first_name}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Last Name
							</td>
							<td>{{$item->last_name}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								Actual Title
							</td>
							<td>{{$item->actual_title}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Work Phone
							</td>
							<td>{{$item->work_phone}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								Cell Number 
							</td>
							<td>{{$item->cell_number}}  </td>
						</tr>
						<tr>
						<tr>
							<td class="col-md-3">				
								Fax Number 
							</td>
							<td>{{$item->fax_number}}  </td>
						</tr>
						<tr>
						<tr>
							<td class="col-md-3">				
								Location 
							</td>
							<td>{{$item->location}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								Email 
							</td>
							<td>{{$item->email}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								Address 
							</td>
							<td>{{$item->address}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				
								City
							</td>
							<td>{{$item->city}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								State/Provision
							</td>
							<td>{{$item->state_province}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Postal Code
							</td>
							<td>{{$item->postal_code}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Country
							</td>
							<td>{{$item->country}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					
								Memo/Note
							</td>
							<td>{{$item->basis_note}}  </td>
						</tr>
						
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End CAA Contacts-->
<!--org_exemptions_divinations-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title"> Exemptions Divinations</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_exemptions_divinations)
					 @foreach($org_exemptions_divinations as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">								 
					   <tbody>				
                        <tr>
							<th colspan='2'>Exemptions Divination #{{++$num}}  
								 <span class='hidden-print'>
                                 @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_exemptions_divinations',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_exemptions_divinations',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_exemptions_divinations',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
										
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_exemptions_divinations',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_exemptions_divinations',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_exemptions_divinations',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgExemptionsDivinationUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">	
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Type
							</td>
							<td>{{$item->type}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Assigned Number
							</td>
							<td>{{$item->assigned_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Regulation
							</td>
							<td>{{$item->regulation}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Basis & Note
							</td>
							<td>{{$item->basis_note}}  </td>
						</tr>
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_exemptions_divinations-->
<!--org_aircraft_listings-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title"> Aircraft Listings</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_aircraft_listings)
					 @foreach($org_aircraft_listings as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Aircraft Listing #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_aircraft_listings',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif	
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_aircraft_listings',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_aircraft_listings',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_aircraft_listings',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_aircraft_listings',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_aircraft_listings',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgAircraftListingUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">	
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Aircraft MMS
							</td>
							<td>{{$item->aircraft_mms}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Registration Number
							</td>
							<td>{{$item->registration_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				RVSM
							</td>
							<td>{{$item->rvsm}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				Parts Pool
							</td>
							<td>{{$item->parts_pool}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				Reliability
							</td>
							<td>{{$item->reliability}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				Lease Acceptable
							</td>
							<td>{{$item->lease_acceptable}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				Interchange
							</td>
							<td>{{$item->interchange}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Note
							</td>
							<td>{{$item->note}}  </td>
						</tr>
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_aircraft_listings-->
<!--org_policy_menual_approvals-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title"> Policy Manuel Approvals</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_policy_menual_approvals)
					 @foreach($org_policy_menual_approvals as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Policy Manuel Approval #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_policy_menual_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_policy_menual_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_policy_menual_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_policy_menual_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_policy_menual_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_policy_menual_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgPolicyMenualApprovalUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">	
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Type Of Approval
							</td>
							<td>{{$item->type_of_approval}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">	Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">				Basis & Note
							</td>
							<td>{{$item->basis_note}}  </td>
						</tr>
						                      
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_policy_menual_approvals-->
<!--org_complexity_reviews-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Organizational Reviews</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_complexity_reviews)
					 @foreach($org_complexity_reviews as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>orga Review #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_complexity_reviews',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_complexity_reviews',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_complexity_reviews',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_complexity_reviews',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_complexity_reviews',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_complexity_reviews',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgComplexityReviewUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Review Date
							</td>
							<td>{{$item->org_review_date.' '.$item->org_review_month.' '.$item->org_review_year}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">					Purpose Of Review
							</td>
							<td>{{$item->purpose_of_review}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Total Employee
							</td>
							<td>{{$item->total_employees}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Total Flt OPS Employees
							</td>
							<td>{{$item->total_flt_ops_employees}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Total Pilots
							</td>
							<td>{{$item->total_pilots}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Total Check Airmen
							</td>
							<td>{{$item->total_check_airmen}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Total Flight Attendants
							</td>
							<td>{{$item->total_flight_attendants}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Total Aircraft Dispatchers
							</td>
							<td>{{$item->total_aircraft_dispatchers}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Flight Followers
							</td>
							<td>{{$item->flight_followers}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Total Load Controllers
							</td>
							<td>{{$item->total_load_controllers}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Total Maint Employees
							</td>
							<td>{{$item->total_maint_employees}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Total Maint Total AV Maint Technicians
							</td>
							<td>{{$item->total_av_maint_technicians}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Total Maint Total AV Repair Specialists
							</td>
							<td>{{$item->total_av_repair_specialists}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Total Maint Total Quality Assurance
							</td>
							<td>{{$item->total_quality_assurance}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Organogaram
							</td>
							<td>	
							@if($item->organogram_upload!='Null'){{HTML::link('files/org_organogram/'.$item->organogram_upload,'Document',array('target'=>'_blank'))}}
							@else
							{{HTML::link('#','No Document Provided')}}
							@endif
							</td>
						</tr>
						<tr>
							<td class="col-md-3">				Note
							</td>
							<td>{{$item->note}}  </td>
						</tr>
						                      
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

				@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

				@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_complexity_reviews-->
<!--org_aerial_work_approvals-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Aerial Work Approvals</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_aerial_work_approvals)
					 @foreach($org_aerial_work_approvals as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Aerial Work Approval #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_aerial_work_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_aerial_work_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_aerial_work_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_aerial_work_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_aerial_work_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_aerial_work_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgAerialWorkApprovalUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">			Type Of Approval
							</td>
							<td>{{$item->type_of_approval}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Aircraft MMS
							</td>
							<td>{{$item->aircraft_mms}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">			Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Method
							</td>
							<td>{{$item->method}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_aerial_work_approvals-->
<!--org_non_certificated_operations-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Non-Certificated Operations</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_non_certificated_operations)
					 @foreach($org_non_certificated_operations as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Non-Certificated Operation #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_non_certificated_operations',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_non_certificated_operations',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_non_certificated_operations',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_non_certificated_operations',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_non_certificated_operations',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_non_certificated_operations',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgNonCertificatedOperationsUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">			Operations Type
							</td>
							<td>{{$item->operations_type}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Aircraft MMS
							</td>
							<td>{{$item->aircraft_mms}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Aircraft Limiting Factor
							</td>
							<td>{{$item->limiting_factor}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">			Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Method
							</td>
							<td>{{$item->method}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">			Basis & Notes
							</td>
							<td>{{$item->basis_notes}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_non_certificated_operations-->

<!--org_flight_operation_Approvals-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Flight Operation Approvals</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_flight_operation_approvals)
					 @foreach($org_flight_operation_approvals as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Flight Operation Approval #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))	

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_flight_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))		
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_flight_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))	

									{{ HTML::linkAction('AircraftController@approve', '',array('org_flight_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_flight_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))		
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_flight_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_flight_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))	

									 <a data-toggle="modal" data-target="#orgFlightOperationsApprovalsUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Type Of Approval
							</td>
							<td>{{$item->type_of_approval}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Limiting Factor
							</td>
							<td>{{$item->limiting_factor}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Aircraft Limiting Factor
							</td>
							<td>{{$item->limiting_factor}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">			Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Method
							</td>
							<td>{{$item->method}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">			Basis & Notes
							</td>
							<td>{{$item->basis_notes}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_flight_operation_Approvals-->
<!--org_fleet_operation_approvals-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Fleet Operation Approvals</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_fleet_operation_approvals)
					 @foreach($org_fleet_operation_approvals as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Fleet Operation Approval #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_fleet_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_fleet_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_fleet_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_fleet_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_fleet_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_fleet_operation_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgFleetOperationsApprovalUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Type Of Approval
							</td>
							<td>{{$item->type_of_approval}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Limiting Factor
							</td>
							<td>{{$item->limiting_factor}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Aircraft MMS
							</td>
							<td>{{$item->aircraft_mms}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">			Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">			Equipment
							</td>
							<td>{{$item->equipment}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Method
							</td>
							<td>{{$item->method}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">			Basis & Notes
							</td>
		
							<td>{{$item->basis_note}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_fleet_operation_approvals-->
<!--org_fleet_maintanance_approvals-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Fleet Maintanance Approvals</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_fleet_maintanance_approvals)
					 @foreach($org_fleet_maintanance_approvals as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Fleet Maintanance Approval #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_fleet_maintanance_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_fleet_maintanance_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_fleet_maintanance_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_fleet_maintanance_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_fleet_maintanance_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_fleet_maintanance_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgFleetMaintananceApprovalUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Type Of Approval
							</td>
							<td>{{$item->type_of_approval}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Limiting Factor
							</td>
							<td>{{$item->limiting_factor}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Aircraft MMS
							</td>
							<td>{{$item->aircraft_mms}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">			Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">			Equipment
							</td>
							<td>{{$item->equipment}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">					Method
							</td>
							<td>{{$item->method}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">			Basis & Notes
							</td>
		
							<td>{{$item->basis_note}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_fleet_maintanance_approvals-->
<!--org_airport_auth-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Airport Authorizations</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_airport_auth)
					 @foreach($org_airport_auth as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Airport Authorization #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_airport_auth',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_airport_auth',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                  @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_airport_auth',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_airport_auth',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_airport_auth',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_airport_auth',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgAirportAuthUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Location
							</td>
							<td>{{$item->location}}  </td>
						</tr>			
						<tr>
							<td class="col-md-3">Type Of Approval
							</td>
							<td>{{$item->type_of_approval}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Limiting Factor
							</td>
							<td>{{$item->limiting_factor}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Aircraft MMS
							</td>
							<td>{{$item->aircraft_mms}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">			Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Note</td>
		
							<td>{{$item->note}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>
		
					
</div>
<!--End org_airport_auth-->
<!--org_leasing_arrangment-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Leasing Arrangments</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_leasing_arrangment)
					 @foreach($org_leasing_arrangment as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Leasing Arrangment #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_leasing_arrangment',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_leasing_arrangment',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_leasing_arrangment',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_leasing_arrangment',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_leasing_arrangment',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_leasing_arrangment',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))
									 <a data-toggle="modal" data-target="#orgLeasingArrangmentUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Arrangement
							</td>
							<td>{{$item->arrangement}}  </td>
						</tr>			
						
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Other
							</td>
							<td>{{$item->other}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Notes</td>
		
							<td>{{$item->notes}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_leasing_arrangment-->
<!--org_contracted_services-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Contracted Services</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_contracted_services)
					 @foreach($org_contracted_services as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Contracted Service #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_contracted_services',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_contracted_services',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))
									{{ HTML::linkAction('AircraftController@approve', '',array('org_contracted_services',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_contracted_services',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_contracted_services',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_contracted_services',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgContractedServicesUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Issued Date
							</td>
							<td>{{$item->issued_date.' '.$item->issued_month.' '.$item->issued_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Type Of Approval
							</td>
							<td>{{$item->type_of_approval}}  </td>
						</tr>			
						
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Aircraft MMS
							</td>
							<td>{{$item->aircraft_mms}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Limiting Factor
							</td>
							<td>{{$item->limiting_factor}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			Control Number
							</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Basis & Note</td>
		
							<td>{{$item->basis_note}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_contracted_services-->
<!--org_amo_approvals-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">AMO Approvals</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_amo_approvals)
					 @foreach($org_amo_approvals as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>AMO Approval #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_amo_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_amo_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_amo_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_amo_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_amo_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_amo_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgAmoApprovalsUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Category Rating
							</td>
							<td>{{$item->category_rating}}  </td>
						</tr>			
						
						<tr>
							<td class="col-md-3">Class Rating
							</td>
							<td>{{$item->class_rating}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Rating Description
							</td>
							<td>{{$item->rating_description}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Contractor
							</td>
							<td>{{$item->contractor}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Control Number</td>
							<td>{{$item->control_number}}  </td>
						</tr>				
						<tr>
							<td class="col-md-3">Specific Equipment
							</td>
							<td>{{$item->specific_equipment}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Available Method</td>
		
							<td>{{$item->available_method}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_amo_approvals-->
<!--org_ato_approvals-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">ATO Approvals</h3>
							  </div>
							  <div class='col-md-6'>
							  
							  </div>
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_ato_approvals)
					 @foreach($org_ato_approvals as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>ATO Approval #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_ato_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_ato_approvals',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_ato_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_ato_approvals',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_ato_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_ato_approvals',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))
								<a data-toggle="modal" data-target="#orgAtoApprovalsUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">ATO Category 
							</td>
							<td>{{$item->ato_category}}  </td>
						</tr>			
						
						<tr>
							<td class="col-md-3">ATO Curriculums
							</td>
							<td>{{$item->ato_curriculums}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>				
						<tr>
							<td class="col-md-3">Control Number</td>
							<td>{{$item->control_number}}  </td>
						</tr>				
						<tr>
							<td class="col-md-3">Approved Training Equipment
							</td>
							<td>{{$item->approved_training_equipment}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Approved Method</td>
		
							<td>{{$item->approved_method}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>
				
					@endforeach

					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_ato_approvals-->
<!--org_aoc_approvals_areas-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">AOC Approvals Areas</h3>
							  </div>
							 
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_aoc_approvals_areas)
					 @foreach($org_aoc_approvals_areas as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>AOC Approval #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_aoc_approvals_areas',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_aoc_approvals_areas',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_aoc_approvals_areas',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_aoc_approvals_areas',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_aoc_approvals_areas',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_aoc_approvals_areas',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgAocApprovalsAreasUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Approved Areas Of Operation
							</td>
							<td>{{$item->approved_areas_of_operation}}  </td>
						</tr>	
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>				
						<tr>
							<td class="col-md-3">Control Number</td>
							<td>{{$item->control_number}}  </td>
						</tr>				
						<tr>
							<td class="col-md-3">Aircraft Authorized
							</td>
							<td>{{$item->aircraft_authorized}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Special Authorizations</td>
		
							<td>{{$item->special_authorizations}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Limitations</td>
		
							<td>{{$item->limitations}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>                
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

					@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_aoc_approvals_areas-->
<!--org_aoc_approval_routes-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">AOC Approvals Routes</h3>
							  </div>
							 
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
					@if($org_aoc_approval_routes)
					 @foreach($org_aoc_approval_routes as $item)	
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>AOC Approval Routes #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_aoc_approval_routes',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_aoc_approval_routes',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_aoc_approval_routes',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_aoc_approval_routes',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_aoc_approval_routes',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_aoc_approval_routes',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgAocApprovalsRoutesUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Origination City
							</td>
							<td>{{$item->origination_city}}  </td>
						</tr>	
						<tr>
							<td class="col-md-3">Destination City
							</td>
							<td>{{$item->destination_city}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Revision Number
							</td>
							<td>{{$item->revision_number}}  </td>
						</tr>			
						<tr>
							<td class="col-md-3">Control Number</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Special Route</td>
		
							<td>{{$item->special_route}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Operational Limitations</td>
		
							<td>{{$item->operational_limitations}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
                </div>                
				
					@endforeach
					@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_aoc_approval_routes-->
<!--org_aoc_maintenance_arrangement-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">AOC Maintenance Arrangements</h3>
							  </div>
							 
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
				@if($org_aoc_maintenance_arrangement)
					 @foreach($org_aoc_maintenance_arrangement as $item)	
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>AOC Maintenance Arrangement #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_aoc_maintenance_arrangement',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif	
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_aoc_maintenance_arrangement',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_aoc_maintenance_arrangement',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_aoc_maintenance_arrangement',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_aoc_maintenance_arrangement',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_aoc_maintenance_arrangement',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgAocMaintenanceArrangementUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Type Of Approval
							</td>
							<td>{{$item->type_of_approval}}  </td>
						</tr>	
						<tr>
							<td class="col-md-3">Location
							</td>
							<td>{{$item->location}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Service Provider
							</td>
							<td>{{$item->service_provider}}  </td>
						</tr>			
						<tr>
							<td class="col-md-3">Control Number</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Applicable Aircraft</td>
		
							<td>{{$item->applicable_aircraft}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Specific Authorizations</td>
		
							<td>{{$item->specific_authorizations}}  </td>
						</tr>
						              
                        </tbody>
						
					
                    </table>
					
              	  </div>                
				
					@endforeach
				@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

				@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_aoc_maintenance_arrangement-->
<!--org_aoc_training_arrangement-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">AOC Training Arrangements</h3>
							  </div>
							 
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
				@if($org_aoc_training_arrangement)
					 @foreach($org_aoc_training_arrangement as $item)	
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>AOC Training Arrangement #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_aoc_training_arrangement',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))
									
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_aoc_training_arrangement',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									
								
                                @endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_aoc_training_arrangement',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_aoc_training_arrangement',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_aoc_training_arrangement',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_aoc_training_arrangement',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgAocTrainingArrangementUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
								@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">		
								Terminated Date
							</td>
							<td>{{$item->org_terminated_date.' '.$item->org_terminated_month.' '.$item->org_terminated_year}}  </td>
						</tr>					
							
						<tr>
							<td class="col-md-3">Location
							</td>
							<td>{{$item->location}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Service Provider
							</td>
							<td>{{$item->service_provider}}  </td>
						</tr>			
						<tr>
							<td class="col-md-3">Control Number</td>
							<td>{{$item->control_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Authorized Training</td>
		
							<td>{{$item->authorized_training}}  </td>
						</tr>
						
						              
                        </tbody>
						
					
                    </table>
					
              	  </div>                
				
					@endforeach
				@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

				@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_aoc_training_arrangement-->
<!--org_approval_simulators-->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Approval Simulators</h3>
							  </div>
							 
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
				@if($org_approval_simulators)
					 @foreach($org_approval_simulators as $item)	
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Approval Simulator#{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_approval_simulators',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_approval_simulators',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_approval_simulators',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_approval_simulators',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_approval_simulators',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_approval_simulators',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgApprovalSimulatorsUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Effective Date
							</td>
							<td>{{$item->org_effective_date.' '.$item->org_effective_month.' '.$item->org_effective_year}}  </td>
						</tr>
											
						<tr>
							<td class="col-md-3">Aircraft MMS
							</td>
							<td>{{$item->aircraft_mms}}  </td>
						</tr>	
						<tr>
							<td class="col-md-3">Assigned Level
							</td>
							<td>{{$item->assigned_level}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Location
							</td>
							<td>{{$item->location}}  </td>
						</tr>			
						<tr>
							<td class="col-md-3">Simulator Number</td>
							<td>{{$item->simulator_number}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Simulator Provider</td>
		
							<td>{{$item->simulator_provider}}  </td>
						</tr>
						
						              
                        </tbody>
						
					
                    </table>
					
              	  </div>                
				
					@endforeach
				@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

				@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_approval_simulators-->
<!--org_docs -->
<div class="row" >
                        
		
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Documen(s)</h3>
							  </div>
							 
                <!-- /.box-header -->
					<div style='display:none'>
					{{$num=0;}}
					</div>
				@if($org_docs)
					 @foreach($org_docs as $item)	
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
							<th colspan='2'>Document #{{++$num}}  
								 <span class='hidden-print'>
                                @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('org_document_list',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('org_document_list',$item->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('org_document_list',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('org_document_list',$item->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('org_document_list',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('org_document_list',$item->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#orgApprovalSimulatorsUpdate{{$item->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</th>
                         </tr>  
						 @if($item->approve=='0')
						<tr>
							<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($item)}}</th>	
						 </tr>
						 @endif
						 @if($item->warning=='1')
						 <tr  >
						 <th colspan='2'>{{AircraftPrimaryInfo::warning($item)}}	</th>
						 </tr>  
						 @endif
						<tr>
							<td class="col-md-3">		
								Active
							</td>
							<td>{{$item->active}}  </td>
						</tr>
						
						
						<tr>
							<td class="col-md-3">			
								Title
							</td>
							<td>{{$item->title}}  </td>
						</tr>
											
						<tr>
							<td class="col-md-3">Effective Date
							</td>
							<td>{{$item->effective_date}}  </td>
						</tr>	
						<tr>
							<td class="col-md-3">Category
							</td>
							<td>{{$item->category}}  </td>
						</tr>					
						<tr>
							<td class="col-md-3">Renewal Date
							</td>
							<td>{{$item->renewal_date}}  </td>
						</tr>			
						<tr>
							<td class="col-md-3">Doc Note</td>
							<td>{{$item->doc_note}}  </td>
						</tr>
						<tr>
							<td class="col-md-3">Simulator Provider</td>
		
							<td>	@if($item->file_name!='Null'){{HTML::link('files/org_document/'.$item->file_name,'Document',array('target'=>'_blank'))}}
													@else
														{{HTML::link('#','No Document Provided')}}
													@endif</td>
						</tr>
						
						              
                        </tbody>
						
					
                    </table>
					
              	  </div>                
				
					@endforeach
				@else
					<div class="box-body">					
                    <table class="table table-bordered">
									 
					   <tbody>	                        
						 <tr>
						 	<td> No Data Is Provided Yet!!</td>
						 </tr>
						 </tbody>
					</table>
					</div>

				@endif
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>		
					
</div>
<!--End org_docs-->
@include('common')
@yield('print')
@include('organization.editForm')
@yield('orgAocCertificateUpdate')

<!-- Including form -->
@include('organization.entryForm')
@yield('orgbusinessNameForm')
@yield('orgCertificateForm')
@yield('orgBaseLocationForm')
@yield('orgManagementContactsForm')
@yield('orgCAAContactsForm')
@yield('orgExemptionsDivinationForm')
@yield('orgAircraftListingForm')
@yield('orgPolicyMenualApprovalForm')
@yield('orgComplexityReviewForm')
@yield('orgAerialWorkApprovalForm')
@yield('orgNonCertificatedOperationsForm')
@yield('orgFleetOperationsApprovalForm')
@yield('orgFleetMaintananceApprovalForm')
@yield('orgFlightOperationsApprovalsForm')
@yield('orgAirportAuthForm')
@yield('orgLeasingArrangmentForm')
@yield('orgContractedServicesForm')
@yield('orgAmoApprovalsForm')
@yield('orgAtoApprovalsForm')
@yield('orgAocApprovalsAreasForm')
@yield('orgAocApprovalsRoutesForm')
@yield('orgAocMaintenanceArrangementForm')
@yield('orgAocTrainingArrangementForm')
@yield('orgApprovalSimulatorsForm')
@yield('orgAocApprovalGeneral')
@yield('financialStatus')
@yield('orgOpsSpec')
@yield('aocCertification')
@yield('docUpload')

<!-- End Including Form -->
<!-- Update form -->
@include('organization.editForm')
@yield('orgPrimaryUpdate')
@yield('orgbusinessNameUpdate')
@yield('orgCertificateUpdate')
@yield('orgBaseLocationUpdate')
@yield('orgManagementContactsUpdate')
@yield('orgCAAContactsUpdate')
@yield('orgExemptionsDivinationUpdate')
@yield('orgAircraftListingUpdate')
@yield('orgPolicyMenualApprovalUpdate')
@yield('orgComplexityReviewUpdate')
@yield('orgAerialWorkApprovalUpdate')
@yield('orgNonCertificatedOperationsUpdate')
@yield('orgFleetOperationsApprovalUpdate')
@yield('orgFleetMaintananceApprovalUpdate')
@yield('orgFlightOperationsApprovalsUpdate')
@yield('orgAirportAuthUpdate')
@yield('orgLeasingArrangmentUpdate')
@yield('orgContractedServicesUpdate')
@yield('orgAmoApprovalsUpdate')
@yield('orgAtoApprovalsUpdate')
@yield('orgAocApprovalsAreasUpdate')
@yield('orgAocApprovalsRoutesUpdate')
@yield('orgAocMaintenanceArrangementUpdate')
@yield('orgAocTrainingArrangementUpdate')
@yield('orgApprovalSimulatorsUpdate')
@yield('orgFinanCilaStatusUpdate')
@yield('orgOpsSpcsUpdate')



<!-- End Update Form -->
</section>
@stop
