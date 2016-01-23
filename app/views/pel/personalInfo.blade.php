@extends('layout')

@section('content')
<section class="content widthController">
            
            <div class="row" style="">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Personal Info.</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($PersonalInfos )
					@foreach($PersonalInfos  as $info)
                    <table class="table table-bordered">
                        <tbody>
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
                              <th colspan='2'>
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_personal_info',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_personal_info',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_personal_info',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_personal_info',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_personal_info',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('pel_personal_info',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#pesonalInfo{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
							     
							  </span>
							  </th>
                            </tr>
                            <tr>
                                <td>
									
									Title
								</td>
                                <td>{{$info->title}}</td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td>{{$info->first_name}}</td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td> {{$info->middle_name}}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{$info->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Mother's Name</td>
                                <td>{{$info->mother_name}}</td>
                            </tr>
							<tr>
                                <td>Father's Name</td>
                                <td>{{$info->father_name}}</td>
                            </tr>
							<tr>
                                <td>Mailing Address</td>
                                <td>{{$info->mailing_address}}</td>
                            </tr>
							<tr>
                                <td>Permanent Address</td>
                                <td>{{$info->parmanent_address}}</td>
                            </tr>
							<tr>
                                <td>Telephone (work)</td>
                                <td>{{$info->telephone_work}}</td>
                            </tr>
							<tr>
                                <td>Telephone (residence)</td>
                                <td>{{$info->telephone_residence}}</td>
                            </tr>
							<tr>
                                <td>Mobile no</td>
                                <td>{{$info->mobile_no}}</td>
                            </tr>
							<tr>
                                <td>Nationality</td>
                                <td>{{$info->nationality}}</td>
                            </tr>
							<tr>
                                <td>National ID</td>
                                <td>{{$info->national_id}}</td>
                            </tr>
							<tr>
                                <td>Sex</td>
                                <td>{{$info->sex}}</td>
                            </tr>
							<tr>
                                <td>Blood Group</td>
                                <td>{{$info->blood_group}}</td>
                            </tr>
							<tr>
                                <td>Date Of Birth</td>
                                <td>{{$info->date_of_birth .' '.$info->month_of_birth .' '.$info->year_of_birth  }}</td>
                            </tr>
							<tr>
                                <td>Photo</td>
                                <td>{{ HTML::image('files/pelPhoto/'.$info->photo, 'PEL Photo', array('class' => 'img-thumbnail','width'=>'250','height'=>'250')) }}</td>
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
				<!--Button for popup-->

@if($PersonalInfos ==null)
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#pesonalInfo">Add Personal Info.</button>
	
</p>
@endif


<!-- start of oppup content-->
    <div class="modal fade" id="pesonalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Personal Info. </h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'pel/savePersonalInfo', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					 <div class="box-body">
                                        <div class="form-group required">
                                           
											{{Form::label('', 'Title', array('class' => 'control-label col-xs-4 '))}}
											<div class="col-xs-6">
											{{Form::select('title', array('0' => '--Select--', 'Mr.' => 'Mr.','Ms.'=>'Ms.','Dr.'=>'Dr.','Prof.'=>'Prof.'), '0',array('class'=>'form-control','required'=>''))}}
											</div>
											
                                        </div>										
												
										
										
										<div class="form-group required ">
											{{Form::label('', 'First Name', array('class' => 'control-label col-xs-4 '))}}
											<div class="col-xs-6">
											{{Form::text('first_name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
										</div>
										<div class="form-group">
											{{Form::label('', 'Middle Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('middle_name','', array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Last Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('last_name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											 </div>
										</div>
										<div class="form-group ">
											
											{{Form::label('', 'Mother\'s Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('mother_name','', array('class' => 'form-control','placeholder'=>''))}}
											 </div>

										</div>
										<div class="form-group">
											{{Form::label('', 'Father\'s Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('father_name','', array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">											
											{{Form::label('', 'Mailing Address', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('mailing_address','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3','required'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Permanent Address', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('parmanent_address','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3','required'=>''))}}
											 </div>
										</div>
										
                                        <div class="form-group">
											{{Form::label('', 'Telephone (work)', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('telephone_work','', array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group">
											{{Form::label('', 'Telephone (residence)', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('telephone_residence','', array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Mobile no', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('mobile_no','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Nationality', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('nationality','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'National ID', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('national_id','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											 </div>
										</div>
										<div class="form-group required ">
                                           
											{{Form::label('', 'Sex', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::select('sex', array('' => '--Select--', 'Male' => 'Male','Female'=>'Female','Others'=>'Others'), null,array('class'=>'form-control','required'=>''))}}
											 </div>
											
                                        </div>
										<div class="form-group required">
                                           
											
											{{Form::label('', 'Blood Group', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::select('blood_group', array('' => '--Select--', 'A+' => 'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','O+'=>'O+','O-'=>'O-','AB+'=>'AB+','AB-'=>'AB-','Unknown'=>'Unknown'), null,array('class'=>'form-control','required'=>''))}}
                                             </div>								
											
											
                                        </div>
										 
										<div class="form-group required">
												
													{{Form::label('', 'Date Of Birth', array('class' => 'control-label col-xs-4'))}}
													
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('date_of_birth', $dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('month_of_birth',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('year_of_birth',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
										</div>
                                        <div class="form-group required">
                                           
                                            
											 {{ Form::label('image', 'Upload Photo: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ Form::file('photo', array('required'=>'')) }}
											 
											 <p class="help-block">Photo size : 300px250px</p>
											 </div>
                                        </div>
                                      
                                    </div><!-- /.box-body -->

                                   
									<div class="form-group">
                           
										<button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                           
									</div>
	
									
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
	<!--Edit content start-->
	

	@include('pel.editForm')
	@yield('updatePersonalInfo')

	
	<!--Edit content End-->
				
	</section>
	
	<script>
		$(document).ready(function(){
			$("#show_add").click(function(){
        $(".row").fadeIn("slow");
    });
}); 
	</script>
@stop
