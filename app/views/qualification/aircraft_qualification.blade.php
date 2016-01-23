@extends('layout')
@section('content')
 
<section class="content contentWidth">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">CAA Employee Aircraft Qualification</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
					
					</div>
					<div class="box-body">
					@foreach($infos as $info)
                    <table class="table table-bordered">
                        <tbody>
						{{Employee::notApproved($info)}}	
                            <tr>
                                <th colspan='2'>Aircraft Qualification  #{{++$a_sl}}
                                    <a onclick=" return confirm('Wanna Delete?')" href="{{'deleteAirQualification/'.$info->id}}" style='color:red;float:right;padding:5px;' >
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                     <a data-toggle="modal" data-target="#{{'AC'.$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td class="col-md-4">Active</td>
                                <td >{{$info->active}}</td>
                            </tr>
                            <tr>
                                <td>License Type</td>
                                <td>{{$info->qualification_type}}</td>
                            </tr>
                            <tr>
                                <td>Total Hours</td>
                                <td>{{$info->total_hours}}</td>
                            </tr>
							<tr>
                                <td>Aircraft MM</td>
                                <td> {{$info->aircraft_mm}}</td>
                            </tr>
                            <tr>
                                <td>Aircraft MSN</td>
                                <td>{{$info->aircraft_msm}}</td>
                            </tr>
                            <tr>
                                <td>License Issue Date</td>
                                <td>{{$info->completion_date." ".$info->completion_month." ".$info->completion_year}}</td>
                            </tr>
							
							<tr>
                                <td>Organization</td>
                                <td>{{$info->institute}}</td>
                            </tr>
							<tr>
                                <td>Issuing Authority</td>
                                <td>{{$info->instructor}}</td>
                            </tr>
							<tr>
                                <td>License Validation</td>
                                <td>{{$info->proof}}</td>
                            </tr>
							
							<tr>
                                            <td>
												Uploaded Evidence :
											</td>
                                            <td>
										@if($info->pdf!='Null'){{HTML::link('files/AircraftQualification/'.$info->pdf,'Document',array('target'=>'_blank'))}}
											@else
												{{HTML::link('#','No Document Provided')}}
											@endif
                                            </td>
                                            
                            </tr>
							
                        </tbody>
                    </table>
					@endforeach
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!--Button for popup-->
    <p class="text-center">
        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#EmploymentDetails">Add New</button>
    </p>
    <!-- start of oppup content-->
    <div class="modal fade" id="EmploymentDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD CAA EMPLOYEE AIRCRAFT QUALIFICATION</h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                    {{Form::open(array('url'=>'qualification/saveAircraftQualification','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
                        <div class="form-group required">
                                           
											{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('active', 'Yes', true) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('qualification_type', 'License Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('qualification_type', array('' => '--Select--', 'PPL' => 'PPL','CPL'=>'CPL','ATPL'=>'ATPL','FI'=>'FI','B1'=>'B1','B2'=>'B2','CA'=>'CA','ATC'=>'ATC','Navigator'=>'Navigator'), null,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
						</div>
						<div class="form-group ">
                                           
											{{Form::label('total_hours', 'Total Hours', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('total_hours','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
                        </div>
						<div class="form-group ">
                                        
											{{Form::label('aircraft_mm', 'Aircraft MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::text('aircraft_mm','', array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
						</div>
						<div class="form-group ">
                                        
											{{Form::label('', 'Aircraft MSN', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::text('aircraft_msm','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
						</div>
						<div class="form-group required">
												
													{{Form::label('completion_date', 'License Issue Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('completion_date', $dates, '0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('completion_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('completion_year',$years, '0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
						</div>
						
						<div class="form-group ">
                                           
											{{Form::label('institute', 'Organization', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('institute','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
                        </div>
						<div class="form-group ">
                                           
											{{Form::label('instructor', 'Issuing Authority', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('instructor','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
                        </div>
						
						 <div class="form-group required">
                                           
											{{Form::label('', 'License Validation', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('proof', 'Yes',true) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('proof', 'No') }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
					
				
					<div class="form-group ">
                                           
                                            
											 {{ Form::label('pdf', 'Upload Evidence: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ Form::file('pdf',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
											 
											 
											 </div>
                    </div>
						
						
						
					
                       
                        <div class="form-group">
                           
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                           
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	<!--------------------Start Update pop Up---------------------------->
	@foreach($infos as $info)
	<div class="modal fade" id="{{'AC'.$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update CAA EMPLOYEE AIRCRAFT QUALIFICATION</h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                    {{Form::open(array('url'=>'qualification/updateAircraftQualification','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
						{{Form::hidden('id',$info->id)}}					
						{{Form::hidden('old_file', $info->pdf)}}
                        <div class="form-group required">
                                           
											{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('active', 'Yes',Input::old('active', $info->active == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active','No',Input::old('active', $info->active == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('qualification_type', 'License Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('qualification_type', array('' => '--Select--', 'PPL' => 'PPL','CPL'=>'CPL','ATPL'=>'ATPL','FI'=>'FI','B1'=>'B1','B2'=>'B2','CA'=>'CA','ATC'=>'ATC','Navigator'=>'Navigator'), $info->qualification_type ,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
						</div>
						<div class="form-group ">
                                           
											{{Form::label('total_hours', 'Total Hours', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('total_hours',$info->total_hours, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group ">
                                        
											{{Form::label('aircraft_mm', 'Aircraft MM', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::text('aircraft_mm',$info->aircraft_mm, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
						</div>
						<div class="form-group ">
                                        
											{{Form::label('', 'Aircraft MSN', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::text('aircraft_msm',$info->aircraft_msm, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
						</div>
						<div class="form-group required">
												
													{{Form::label('completion_date', 'License Issue Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('completion_date', $dates,  $info->completion_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('completion_month',$months, $info->completion_month  ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('completion_year',$years, $info->completion_year ,array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						
						<div class="form-group ">
                                           
											{{Form::label('institute', 'Organization', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('institute', $info->institute , array('class' => 'form-control','placeholder'=>'',))}}
											</div>
                        </div>
						<div class="form-group ">
                                           
											{{Form::label('instructor', 'Issuing Authority', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('instructor',$info->instructor, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
                        </div>
						
						 <div class="form-group required">
                                           
											{{Form::label('', 'License Validation', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('proof', 'Yes',Input::old('proof', $info->proof == 'Yes'),array())}} &nbsp  Yes</label>
									 <label> {{ Form::radio('proof', 'No',Input::old('proof', $info->proof == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
					
					
					<div class="form-group ">
                                           
                                            
											 {{ Form::label('pdf', 'Upload Updated Evidence: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ Form::file('pdf',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
											 
											 
											 </div>
                    </div>
						
						
						
					
                       
                        <div class="form-group">
                           <button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	@endforeach
	<!--------------------End Update pop Up---------------------------->
    <script>
$(document).ready(function(){
  
 
  
});
</script>



@stop