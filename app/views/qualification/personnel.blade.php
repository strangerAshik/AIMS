@extends('layout')

@section('content')
<section class="content" style="max-width:760px;margin:0 auto;">
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
					@foreach($infos as $info)
                    <table class="table table-bordered">
                        <tbody>
						{{Employee::notApproved($info)}}	
                            <tr>
                                
                                <th colspan='2' >
								
                                    <a href="{{'deletePersonnel/'.$info->id}}" style='color:red;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <a data-toggle="modal" data-target="#{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
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
                                <td>{{ HTML::image('img/PersonnelPhoto/'.$info->photo, 'Employee Photo', array('class' => 'img-thumbnail','width'=>'250','height'=>'250')) }}</td>
                            </tr>
                        </tbody>
                    </table>
					@endforeach
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						</div>
						
				</div>
				<!--Button for popup-->
@if($infos==null)
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#EmploymentDetails">Add New</button>
	
</p>
@endif


<!-- start of oppup content-->
    <div class="modal fade" id="EmploymentDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Personal Info. </h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					
					{{Form::open(array('url' => 'qualification/savePersonnel', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
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
	<!--Edit content start--->
	@if($infos!=null)
	<div class="modal fade" id="{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Personal Info. </h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					@foreach($infos as $info)
					{{Form::open(array('url' => 'qualification/editPersonnel', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					 <div class="box-body">
										{{Form::hidden('id', $info->id)}}
										{{Form::hidden('old_photo',$info->photo)}}
                                        <div class="form-group required">
                                           
											{{Form::label('', 'Title', array('class' => 'control-label col-xs-4 '))}}
											<div class="col-xs-6">
											{{Form::select('title', array('0' => '--Select--', 'Mr.' => 'Mr.','Ms.'=>'Ms.','Dr.'=>'Dr.','Prof.'=>'Prof.'), $info->title ,array('class'=>'form-control'))}}
											</div>
											
                                        </div>										
												
										
										
										<div class="form-group required ">
											{{Form::label('', 'First Name', array('class' => 'control-label col-xs-4 '))}}
											<div class="col-xs-6">
											{{Form::text('first_name',$info->first_name, array('class' => 'form-control','placeholder'=>''))}}
											</div>
										</div>
										<div class="form-group">
											{{Form::label('', 'Middle Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('middle_name',$info->middle_name, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Last Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('last_name',$info->last_name, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group ">
											
											{{Form::label('', 'Mother\'s Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('mother_name',$info->mother_name, array('class' => 'form-control','placeholder'=>''))}}
											 </div>

										</div>
										<div class="form-group">
											{{Form::label('', 'Father\'s Name', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('father_name',$info->father_name, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">											
											{{Form::label('', 'Mailing Address', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('mailing_address',$info->mailing_address, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Permanent Address', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('parmanent_address',$info->parmanent_address, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
										</div>
										
                                        <div class="form-group">
											{{Form::label('', 'Telephone (work)', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('telephone_work',$info->telephone_work, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group">
											{{Form::label('', 'Telephone (residence)', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('telephone_residence',$info->telephone_residence, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Mobile no', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('mobile_no',$info->mobile_no, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'Nationality', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('nationality',$info->nationality, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required">
											{{Form::label('', 'National ID', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::text('national_id',$info->national_id, array('class' => 'form-control','placeholder'=>''))}}
											 </div>
										</div>
										<div class="form-group required ">
                                           
											{{Form::label('', 'Sex', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::select('sex', array('' => '--Select--', 'Male' => 'Male','Female'=>'Female','Others'=>'Others'), $info->sex,array('class'=>'form-control'))}}
											 </div>
											
                                        </div>
										<div class="form-group required">
                                           
											
											{{Form::label('', 'Blood Group', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::select('blood_group', array('0' => '--Select--', 'A+' => 'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','O+'=>'O+','O-'=>'O-','AB+'=>'AB+','AB-'=>'AB-','Unknown'=>'Unknown'), $info->blood_group ,array('class'=>'form-control'))}}
                                             </div>								
											
											
                                        </div>
										 
										<div class="form-group required">
												
													{{Form::label('', 'Date Of Birth', array('class' => 'control-label col-xs-4'))}}
													
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('date_of_birth', $dates ,$info->date_of_birth,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('month_of_birth',$months,$info->month_of_birth,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('year_of_birth',$years,$info->year_of_birth,array('class'=>'form-control'))}}
														</div>
													</div>
										</div>
                                        <div class="form-group required">
                                           
                                            
											 {{ Form::label('image', 'Upload New Photo: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ HTML::image('img/PersonnelPhoto/'.$info->photo, 'Employee Photo', array('class' => 'img-thumbnail','width'=>'250','height'=>'250')) }}
											 {{ Form::file('photo') }}
											 
											 <p class="help-block">Photo size : 300px250px</p>
											 </div>
                                        </div>
                                      
                                    </div><!-- /.box-body -->

                                   <p class="text-center">
									<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#EmploymentDetails">Save</button>
	
									</p>
					{{Form::close()}}
					@endforeach
				</div>
			</div>
		</div>
	</div>
	@endif
	<!--Edit content End--->
				
	</section>
	
	<script>
		$(document).ready(function(){
			$("#show_add").click(function(){
        $(".row").fadeIn("slow");
    });
}); 
	</script>
@stop
