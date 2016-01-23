@extends('layout')
@section('content')
<section class="content widthController">
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">General Info</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($generalInfos)
					@foreach($generalInfos as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_general_info',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_general_info',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_general_info',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_general_info',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_general_info',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}

									{{ HTML::linkAction('AircraftController@warning', '',array('pel_general_info',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateGeneralInfo{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                                <td>									
									License Type
								</td>
                                <td>{{$info->license_type}}</td>
                            </tr>
                            <tr>
                                <td>									
									License Rating
								</td>
                                <td>{{$info->license_rating}}</td>
                            </tr>
                          
							<tr>
                                <td>Effective Date</td>
                                <td>{{$info->issued_date.' '.$info->issued_month.' '.$info->issued_year}}</td>
                            </tr>
							<tr>
                                <td>Effective Date</td>
                                <td>{{$info->expiration_date.' '.$info->expiration_month.' '.$info->expiration_year}}</td>
                            </tr>
							<tr>
                                <td>Old Certificate Number</td>
                                <td>{{$info->old_certificate_number}}</td>
                            </tr>
							<tr>
                                <td>Basis For Issuance</td>
                                <td>{{$info->basis_for_issuance}}</td>
                            </tr>
							<tr>
                                <td>Category</td>
                                <td>{{$info->category}}</td>
                            </tr>
							<tr>
                                <td>Class</td>
                                <td>{{$info->class}}</td>
                            </tr>
							<tr>
                                <td>Ratings</td>
                                <td>{{$info->ratings}}</td>
                            </tr>
							<tr>
                                <td>Endorsement</td>
                                <td>{{$info->endorsement}}</td>
                            </tr>
							<tr>
                                <td>Limitations</td>
                                <td>{{$info->limitations}}</td>
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
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#generalInfo">Add General Info</button>
	
</p>

@include('pel.entryForm')
@yield('generalInfo') 

@include('pel.editForm')
@yield('updategeneralInfo') 
</section>
@stop