@extends('layout')
@section('content')
<section class="content widthController">
<div style="display:none">{{$num=0}}</div>
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">License History</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($licenseHistorys)
					@foreach($licenseHistorys as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>License History #{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_license_history',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_license_history',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_license_history',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_license_history',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_license_history',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}

									{{ HTML::linkAction('AircraftController@warning', '',array('pel_license_history',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateLicenseHistory{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
							     
							  </span>
							  </th>
                            </tr>
                             @if($info->approve=='0')
							  <tr>
								<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($info)}}</th>	
							 </tr>
							 @endif
							 @if($info->warning=='1')
								 <tr  >
								 <th colspan='2'>{{AircraftPrimaryInfo::warning($info)}}	</th>
								 </tr>  
							 @endif
                            <tr>
                                <td>									
									Active
								</td>
                                <td>{{$info->active}}</td>
                            </tr>
                          
							<tr>
                                <td>Effective Date</td>
                                <td>{{$info->effective_date.' '.$info->effective_month.' '.$info->effective_year}}</td>
                            </tr>
							<tr>
                                <td>Certificate Type</td>
                                <td>{{$info->certificate_type}}</td>
                            </tr>
							<tr>
                                <td>Historical Event</td>
                                <td>{{$info->historical_event}}</td>
                            </tr>
							<tr>
                                <td>Results</td>
                                <td>{{$info->results}}</td>
                            </tr>
							<tr>
                                <td>Organization</td>
                                <td>{{$info->organization}}</td>
                            </tr>
							<tr>
                                <td>Designation Number</td>
                                <td>{{$info->designation_number}}</td>
                            </tr>
							<tr>
                                <td>Investigation Number</td>
                                <td>{{$info->investigation_number}}</td>
                            </tr>
							<tr>
                                <td>Accident Number</td>
                                <td>{{$info->accident_number}}</td>
                            </tr>
							<tr>
                                <td>Memo/Notes</td>
                                <td>{{$info->memo_notes}}</td>
                            </tr>
							<tr>
                                <td>File</td>
                                <td>@if($info->file!='Null'){{HTML::link('files/pelLicenseHistory/'.$info->file,'File',array('target'=>'_blank'))}}
													@else
														{{HTML::link('#','No FIle  Is Provided')}}
													@endif</td>
                            </tr>
							
                        </tbody>
                    </table>
					@endforeach
					@else 
					<table class="table table-bordered">
					<tr><td>No Data Is Given Yet!!</td></tr>
					</table>
					@endif
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						</div>
						
</div>
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#licenseHistory">Add License History</button>
	
</p>

@include('pel.entryForm')
@yield('licenseHistory') 

@include('pel.editForm')
@yield('updateLicenseHistory') 
</section>
@stop