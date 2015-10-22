@extends('layout')
@section('content')
<section class="content widthController">
<div style="display: none">{{$num=0}}</div>
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Medical Certifications</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($medicalCertifications)
					@foreach($medicalCertifications as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>
								<span class='hidden-print'> Medical Certification{{++$num}}
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_medical_certification',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_medical_certification',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_medical_certification',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_medical_certification',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_medical_certification',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('pel_medical_certification',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateMedicalCertifications{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                                <td>Certificate Class</td>
                                <td>{{$info->certificate_class}}</td>
                            </tr>
                            <tr>
                                <td>Basis For Issuance</td>
                                <td> {{$info->basis_for_issuance}}</td>
                            </tr>
                            
							<tr>
                                <td>Effective Date</td>
                                <td>{{$info->effective_date.' '.$info->effective_month.' '.$info->effective_year}}</td>
                            </tr>
							<tr>
                                <td>Expiration Date</td>
                                <td>{{$info->expiration_date.' '.$info->expiration_month.' '.$info->expiration_year}}</td>
                            </tr>
							<tr>
                                <td>Expiration Date</td>
                                <td>{{$info->examination_date.' '.$info->examination_month.' '.$info->examination_year}}</td>
                            </tr>
							<tr>
                                <td>Medical Examiner</td>
                                <td>{{$info->medical_examiner}}</td>
                            </tr>
							<tr>
                                <td>Medical Limitation</td>
                                <td>{{$info->medical_limitation}}</td>
                            </tr>
							<tr>
                                <td>File</td>
                                <td>@if($info->file!='Null'){{HTML::link('files/pelMedicalCertification/'.$info->file,'File',array('target'=>'_blank'))}}
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
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#medicalCertification">Add Medical Certification</button>	
</p>

@include('pel.entryForm')
@yield('medicalCertification') 

@include('pel.editForm')
@yield('updateMedicalCertification') 
</section>
@stop