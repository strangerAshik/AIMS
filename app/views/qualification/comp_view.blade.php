@extends('layout')
@section('content')
<!--Personnel-->
<div style="display:none">
{{$role=Auth::User()->Role()}}
</div>
<section class="content contentWidth">
 <div class="row" style="">
                        <!-- left column -->
                        <div class="col-md-12" id="approvalPendingPersonalInfo">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Personal Info.</h3>
									
							  </div>
							 
							 
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($personnel)
					@foreach($personnel as $person)
                    <table class="table table-bordered" id="{{$person->id}}">
                        <tbody>
						{{Employee::notApproved($person)}}	
						
						  <tr class='hidden-print'>
                                
                                <th colspan='2' >
								
                                @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))
									{{ HTML::linkAction('QualificationController@deletePersonnel', '',array($person->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
                               
                                @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))
								   
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_personal',$person->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}

                                    {{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_personal',$person->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif 
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
                                     <a data-toggle="modal" data-target="#person{{$person->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                @endif
									
                                    
								
									
                                </th>
                            </tr>
						
                             <tr>
                                <td>
									
									CAA ID
								</td>
                                <td>{{$person->caa_id}}</td>
                            </tr>
							<tr>
                                <td>									
									Title
								</td>
                                <td>{{$person->title}}</td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td>{{$person->first_name}}</td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td> {{$person->middle_name}}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{$person->last_name}}</td>
                            </tr>
							 <tr>
                                <td class="col-md-4" >Photo</td>
                                <td>{{ HTML::image('img/PersonnelPhoto/'.$person->photo, 'Employee Photo', array('class' => 'img-thumbnail','width'=>'160','height'=>'120')) }}</td>
                            </tr>
                            <tr>
                                <td>Mother's Name</td>
                                <td>{{$person->mother_name}}</td>
                            </tr>
							<tr>
                                <td>Father's Name</td>
                                <td>{{$person->father_name}}</td>
                            </tr>
							<tr>
                                <td>Mailing Address</td>
                                <td>{{$person->mailing_address}}</td>
                            </tr>
							<tr>
                                <td>Permanent Address</td>
                                <td>{{$person->parmanent_address}}</td>
                            </tr>
							<tr>
                                <td>Telephone (work)</td>
                                <td>{{$person->telephone_work}}</td>
                            </tr>
							<tr>
                                <td>Telephone (residence)</td>
                                <td>{{$person->telephone_residence}}</td>
                            </tr>
							<tr>
                                <td>Mobile no</td>
                                <td>{{$person->mobile_no}}</td>
                            </tr>
							<tr>
                                <td>Nationality</td>
                                <td>{{$person->nationality}}</td>
                            </tr>
							<tr>
                                <td>National ID</td>
                                <td>{{$person->national_id}}</td>
                            </tr>


							<tr>
                                <td>Sex</td>
                                <td>{{$person->sex}}</td>
                            </tr>
							<tr>
                                <td>Blood Group</td>
                                <td>{{$person->blood_group}}</td>
                            </tr>
							<tr>
                                <td>Date Of Birth</td>
                                <td>{{$person->date_of_birth .' '.$person->month_of_birth .' '.$person->year_of_birth  }}</td>
                            </tr>
							<tr>
								<td colspan="2"><i>Created at : {{$person->created_at}} | Updated at : {{$person->updated_at}} </i></td>

							</tr>
							
                        </tbody>
                    </table>
					@endforeach
					@else 
					<table class="table table-bordered">
						<tr>
							<td colspan="2">Data Not Provided</td>
						</tr>
					</table>
					@endif
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						</div>
						
				</div
				<!------Edit Personal------>
					<!--Edit content start-->
	@if($personnel!=null)
	<div  class="modal fade" id="person{{$person->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Personal Info. </h4>
                </div>
				 <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					@foreach($personnel as $info)
					{{Form::open(array('url' => 'qualification/editPersonnel', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					 <div class="box-body">
										{{Form::hidden('id', $info->id)}}
										{{Form::hidden('old_photo',$info->photo)}}
										<div class="form-group ">
                                           
											{{Form::label('', 'CAA ID', array('class' => 'control-label col-xs-4 '))}}
											<div class="col-xs-6">
											{{Form::text('caa_id',$info->caa_id, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                                        </div>		
                                        <div class="form-group required">
                                           
											{{Form::label('', 'Title', array('class' => 'control-label col-xs-4 '))}}
											<div class="col-xs-6">
											{{Form::select('title', array('0' => '--Select--', 'Mr.' => 'Mr.','Ms.'=>'Ms.'), $info->title ,array('class'=>'form-control'))}}
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
											{{Form::label('', 'National ID / Passport No.', array('class' => 'control-label col-xs-4'))}}
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
                                        <div class="form-group">
                                           
                                            
											 {{ Form::label('image', 'Upload New Photo: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ HTML::image('img/PersonnelPhoto/'.$info->photo, 'Employee Photo', array('class' => 'img-thumbnail','width'=>'250','height'=>'250')) }}
											 {{ Form::file('photo',array("accept"=>"image/*",'class'=>'fileupload')) }}
											 
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
	<!--Edit content End-->
				<!--End Edit Personal-->
<!--End Personnel-->
<!--Start academic Education-->
<div class="row">
                        <div class="col-md-12" id="approvalPendingAcademicQualification">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Academic Qualification</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
								@if($accademic)	
								@foreach($accademic as $acca)								
									
                                    <table class="table table-bordered" id="{{$acca->id}}">
                                    
									<tbody>
									{{Employee::notApproved($acca)}}	
								<tr>		
                                
                                <th colspan='2' >
								    Academic Qualification   #{{++$sl1}}
								    <span class='hidden-print'>
								
                                   @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))    
                              
									{{ HTML::linkAction('QualificationController@deleteAccademic', '',array($acca->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									@endif 
									@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))
								
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_edu_accademic',$acca->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									

                                    {{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_edu_accademic',$acca->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
                                    @endif
									@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
                                    <a data-toggle="modal" data-target="#acca{{$acca->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    @endif

                                    </span>
									
								
                                </th>
                            </tr>
                                        </tr>
                                        <tr>
                                           
                                            <td class="col-md-4">Level of Education </td>
                                            <td >{{$acca->level}}</td>
                                            
                                        </tr>
                                        
										<tr>
                                           
                                            <td>Name of Degree</td>
                                            <td>{{$acca->name_of_degree}}</td>
                                            
                                        </tr>
										<tr>
                                           
                                            <td>Educational Institute</td>
                                            <td>{{$acca->institute}}</td>
                                            
                                        </tr> 
										<tr>
                                            <td>Passing Year</td>
                                            <td>{{$acca->pussing_year}}</td>
                                            
                                        </tr>
										<tr>
                                            <td>Class/CGPA/ Grade/ Percentage</td>
                                            <td>{{$acca->standard .' :  '.$acca->grade_division }}</td>
                                            
                                        </tr>
										<tr>
                                            <td>Discipline</td>
                                            <td>{{$acca->discipline}}</td>
                                            
                                        </tr>
										<tr>
                                            <td>Specialization</td>
                                            <td>{{$acca->specialization}}</td>                                        
                                        </tr>
                                         <tr>
                                            <td>Certificate</td>
                                            <td>
                                            	  @if($acca->certificate!='Null'){{HTML::link('files/employee/'.$acca->certificate,'Certificate ',array('target'=>'_blank'))}}
                                                    @else
                                                        {{HTML::link('#','No Certificate Provided')}}
                                                    @endif

                                            </td>                                        
                                        </tr>
                                        <tr>
											<td colspan="2"><i>Created at : {{$acca->created_at}} | Updated at : {{$acca->updated_at}} </i></td>

										</tr>
                                    </tbody></table>
									@endforeach
									@else 
									<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
									</table>
									@endif
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
</div>   
<!--Edit option For Academic Qualification-->
	
	@foreach($accademic as $acca)
	<div  class="modal fade" id="{{'acca'.$acca->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Academic Qualification </h4>
                </div>
				 <div class="modal-body">
				 
                    <!-- The form is placed inside the body of modal -->
                   
					
					
					{{Form::open(array('url' => 'qualification/updateAccademic', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>'true'))}}
						{{Form::hidden('id', $acca->id)}}
						{{Form::hidden('old_certificate', $acca->certificate)}}
						<div class="form-group required">
                                        
											{{Form::label('level', 'Level [highest degree first]', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('level', array('Null' => '--Select--', 'Post Doctorate or Equivalent' => 'Post Doctorate or Equivalent','Doctorate'=>'Doctorate','Masters or Equivalent'=>'Masters or Equivalent','Bachelors or Equivalent'=>'Bachelors or Equivalent','Diploma'=>'Diploma','H.S.C. or Equivalent'=>'H.S.C. or Equivalent','S.S.C. or Equivalent'=>'S.S.C. or Equivalent','Below S.S.C.'=>'Below S.S.C.'), $acca->level,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>	
					<div class="form-group required">
                                        
											{{Form::label('', ' Name of degree', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('name_of_degree',$acca->name_of_degree, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('discipline', 'Discipline', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('discipline', array('Null' => '--Select--', 'Arts' => 'Arts','Science'=>'Science','Commerce'=>'Commerce','Biological Science'=>'Biological Science','Business Studies/ Administration'=>'Business Studies/ Administration','Engineering/ Technology/ Applied Science'=>'Engineering/ Technology/ Applied Science','Medical Science'=>'Medical Science','Social Science'=>'Social Science'), $acca->discipline,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('specialization', 'Specialization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('specialization',$acca->specialization, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('institute', 'Educational institute', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('institute',$acca->institute, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('pussing_year', ' Passing year', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('pussing_year', $years, $acca->pussing_year, array('class' => 'form-control','placeholder'=>'')) }}
											
											</div>
											
                    </div>
					<div class="form-group required">
					{{Form::label('', 'Result', array('class' => 'col-xs-4 control-label'))}}
					<div class="row">
														<div class="col-xs-3">
														{{Form::select('standard', array('Null' => '--Select--', 'Grade' => 'Grade','CGPA'=>'CGPA','Division'=>'Division','Class'=>'Class','Percentage'=>'Percentage'), $acca->standard,array('class'=>'form-control','id'=>'Standard','required'=>''))}}
														</div>
														<div class="col-xs-2">												
														{{Form::text('grade_division',$acca->grade_division, array('class' => 'form-control','placeholder'=>'grade or division','required'=>''))}}
														</div>
														<div class="col-xs-2">
															{{Form::text('out_of',$acca->out_of, array('class' => 'form-control','placeholder'=>'out of','id'=>'out_of'))}}
														</div>
													</div>
					</div>
					
					<div class="form-group required">
                                           
											{{Form::label('certificate', ' Provide Updated Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											  @if($acca->certificate!='Null'){{HTML::link('files/employee/'.$acca->certificate,'Certificate ',array('target'=>'_blank'))}}
                                                    @else
                                                        {{HTML::link('#','No Certificate Provided')}}
                                                    @endif
                                                    
											{{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
											
											</div>
											
                    </div>
					
                    

                    <div class="form-group">
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
					
					{{Form::close()}}
					
				</div>
			</div>
		</div>
	</div>
	@endforeach

	<!--End Edit option For Academic Qualification-->
<!--End academic Education-->
<!--Start Thesis Education-->
<div class="row">
                        <div class="col-md-12" id="approvalPendingThesis">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Thesis/Project/Internship/Dissertation  </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                @if($thesis)
								@foreach($thesis as $thes)
                                    <table class="table table-bordered"  id="{{$thes->id}}">
                                        <tbody>
										{{Employee::notApproved($thes)}}	
										<tr>                                           
                                            <th colspan='2'>Thesis/Project/Internship/Dissertation    #{{++$sl2}}
                                            <span class='hidden-print'>
                                            @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))    
                              
											
										    {{ HTML::linkAction('QualificationController@deleteThesis', '',array($thes->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
										   @endif
										     @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))
								

										    {{ HTML::linkAction('QualificationController@approve', '',array('qualification_edu_thesis',$thes->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
											
											{{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_edu_thesis',$thes->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
											@endif
											@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
											<a data-toggle="modal" data-target="#{{'thesis'.$thes->id}}" href='' style='color:green;float:right;padding:5px;'>
												<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
											</a>
											@endif
										 </span>

											
											</th>
                                   
                                        </tr>
                                        <tr>
                                           
                                            <td class='col-md-4'>Degree level</td>
                                            <td >{{$thes->level}}</td>
                                            
                                        </tr>
                                        
										<tr>
                                           
                                            <td>Type</td>
                                            <td>{{$thes->type}}</td>
                                            
                                        </tr>
										<tr>
                                           
                                            <td>Title</td>
                                            <td>{{$thes->title}}</td>
                                            
                                        </tr> 
										<tr>
                                            <td>Institute</td>
                                            <td>{{$thes->institute}}</td>
                                            
                                        </tr>
										<tr>
                                            <td>Duration</td>
                                            <td>{{$thes->duration}}</td>
                                            
                                        </tr>
										 <tr>
											<td colspan="2"><i>Created at : {{$thes->created_at}} | Updated at : {{$thes->updated_at}} </i></td>

										</tr>                            
                                       
                                    </tbody></table>
									@endforeach
									@else 
									<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
									</table>
									@endif
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                            </div> 
<!--Start Edit option For Thesis Qualification-->
	@foreach($thesis as $thes)
	<div  class="modal fade" id="{{'thesis'.$thes->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Thesis/Project/Internship/Dissertation </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'qualification/updateThesis','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				

					{{Form::hidden('idThesis', $thes->id)}}
					<div class="form-group required">
                                        
											{{Form::label('level', ' Degree level', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('level', array('Null' => '--Select--', 'Doctorate' => 'Doctorate','Masters or Equivalent'=>'Masters or Equivalent','Bachelors or Equivalent'=>'Bachelors or Equivalent'), $thes->level ,array('class'=>'form-control','id'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('type', 'Type ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('type', array('Null' => '--Select--', 'Thesis' => 'Thesis','Project'=>'Project','Internship'=>'Internship','Dissertation'=>'Dissertation'), $thes->type ,array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$thes->title, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('institute', 'Institute', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('institute',$thes->institute, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					 
					<div class="form-group required">
                                           
											{{Form::label('duration', 'Duration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('duration',$thes->duration, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					
					
                    

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                
				{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	@endforeach
	<!--End Edit option For Thesis Qualification-->


<script>
$(document).ready(function(){
  $("select#Standard").change(function(){
     var standard=$( "#Standard option:selected" ).text();
	 if(standard=='Grade'){$("#out_of").prop('disabled', false);}
	 else $("#out_of").prop('disabled', true);
	 
});
  
});
</script>
<!--End Thesis Education-->
<!--Start Pro_degree-->
<div class="row">
                        <div class="col-md-12" id="approvalPendingProfessionalDeg">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Professional Degree </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								<?php $num=0;?>
								@if($pro_degree)
								 @foreach($pro_degree as $pro)		
                                    <table class="table table-bordered" id="{{$pro->id}}">
                                        <tbody>
										{{Employee::notApproved($pro)}}	
                                       								
										<tr>		
                                
                                <th colspan='2' >
								    Professional Degree   #{{++$num}}
								    <span class='hidden-print'>
									
                                   @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))    
                              
                                
									{{ HTML::linkAction('QualificationController@deleteProDegree', '',array($pro->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									@endif

									  @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))									
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_pro_degree',$pro->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}

                                    {{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_pro_degree',$pro->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
                                    @endif

								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
	
                                   <a data-toggle="modal" data-target="#{{'proD'.$pro->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
											</a>
								@endif
									</span>
                                </th>
                            </tr>
												
										<tr>                                           
                                            <th >Name of professional degree</th>  <td>{{$pro->pro_degree_name}}</td>
                                        </tr>
                                        <tr>
                                            <th >Institute</th><td>{{$pro->pro_degree_institute}}</td>

                                        </tr>
                                        <tr>
                                            <th >Duration</th>  <td>{{$pro->pro_degree_duration}}</td>
                                        </tr>
                                        <tr>
                                            <th >Class/ Grade/ Percentage</th> <td>{{$pro->pro_degree_grade}}</td>
                                        </tr>
                                        <tr>
                                            <th >Major/Area</th> <td>{{$pro->pro_degree_major_area}}</td>
                                        </tr>
                                        <tr>
                                            <th >Year</th> <td>{{$pro->pro_degree_year}}</td>
                                        </tr>
											
										 <tr>
											<td colspan="2"><i>Created at : {{$pro->created_at}} | Updated at : {{$pro->updated_at}} </i></td>

										</tr> 
										
										
                                            
                                       
                                    </tbody></table>
                                    	    
                                       @endforeach
                                       @else 
                                       <table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
										</table>
									   @endif
										
								
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
</div>
<!--Edit Option Start-->
@foreach($pro_degree as $pro)
<div  class="modal fade" id="{{'proD'.$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Professional Degree </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               {{Form::open(array('url'=>'qualification/updatePro_degree','method'=>'post','class'=>'form-horizontal','role'=>'form','data-toggle'=>'validator'))}}
						{{Form::hidden('id', $pro->id)}}
					<div class="form-group">
                                           
											{{Form::label('pro_degree_name', 'Name of professional degree', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_name',$pro->pro_degree_name, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_institute', 'Educational institute', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_institute',$pro->pro_degree_institute, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_duration', 'Duration', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_duration',$pro->pro_degree_duration, array('class' => 'form-control','placeholder'=>'i.e 2 Days/1 month/ 1 Year'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_grade', 'Class/Grade/Percentage', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_grade',$pro->pro_degree_grade, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_major_area', 'Major/Area', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_major_area',$pro->pro_degree_major_area, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_year', 'Year', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('pro_degree_year', $years, $pro->pro_degree_year, array('class' => 'form-control','placeholder'=>'')) }}
											</div>
											
                    </div>
				
                    

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endforeach
<!--Edit Option End-->
<!--End Pro_degree-->
<!--Start Training/workshop/ojt-->
<div class="row">
                        <div class="col-md-12" id="approvalPendingTraining">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Training/ Workshop & Seminar / OJT  </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                @if($training_ojt)
								@foreach($training_ojt as $info)
                                 <table class="table table-bordered" id="{{$info->id}}">
                                        <tbody>
										{{Employee::notApproved($info)}}	
										<tr>                                           
                                            <th colspan='2'>Training/ Workshop & Seminar / OJT   #{{++$sl3}}
											<span class='hidden-print'>
											@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))    
                                
											{{ HTML::linkAction('QualificationController@deleteTraining', '',array($info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
											@endif
											@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))
								
											{{ HTML::linkAction('QualificationController@approve', '',array('qualification_training_ojt',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}

											 {{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_training_ojt',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
											 @endif
											 @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
											<a data-toggle="modal" data-target="#{{'training'.$info->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
											</a>
											@endif
											</span>
											
											</th>
                                        </tr>
                                        <tr>
                                           
                                            <td class="col-md-4">Category</td>
                                            <td >{{$info->category}}</td>
                                            
                                        </tr>
                                        @if($info->category=='Training')
											<tr>
												<td>Type of Training</td><td>{{$info->type_of_training}}</td>
											</tr>
											<tr>
												<td>Training Course / Number</td><td>{{$info->training_course}}</td>
											</tr>
											<tr>
												<td>Subject / Specialization</td><td>{{$info->subject}}</td>
											</tr>
										@endif
										@if($info->category=='OJT')
											<tr>
												<td>Training Task</td><td>{{$info->training_task}}</td>
											</tr>
											
											
										@endif
										@if($info->category=='Seminar / Workshop / Meeting / Conference')
											<tr>
												<td>Topic</td><td>{{$info->topic}}</td>
											</tr>
											
											
										@endif
										<tr>
                                           
                                            <td>
												Major Area
											</td>
                                            <td>
                                               {{$info->major_area}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                           
                                            <td>
											Instructor(s):
											</td>
                                            <td>
                                               {{$info->instructor}}
                                            </td>
                                            
                                        </tr> 
										<tr>
                                            <td>
												
												Institute:
											</td>
                                            <td>
                                               {{$info->institute}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>												
												Location:
											</td>
                                            <td>
                                               {{$info->location}}
												
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>
												Certificate Issued:
											</td>
                                            <td>
                                               {{$info->proof}}
                                            </td>
                                            
                                        </tr>
										
										<tr>
                                            <td>
												Start Date:
											</td>
                                            <td>
                                                {{$info->start_date}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>
												End Date:
											</td>
                                            <td>
                                                {{$info->end_date}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>
												Uploaded Evidence:
											</td>
                                            <td>
										@if($info->pdf!='Null'){{HTML::link('files/TrainingWorkshopOJT/'.$info->pdf,'Document',array('target'=>'_blank'))}}
											@else
												{{HTML::link('#','No Document Provided')}}
											@endif
                                            </td>
                                            
                                        </tr>
										
                                        
                                        <tr>
											<td colspan="2"><i>Created at : {{$info->created_at}} | Updated at : {{$info->updated_at}} </i></td>

										</tr>    
                                       
                                    </tbody></table>
								@endforeach
								@else 
								<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
								</table>
								@endif

                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                            </div>  
<!--Edit Pop up Start-->
@foreach($training_ojt as $info)
<div  class="modal fade" id="{{'training'.$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Training/ Workshop/ OJT </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               {{Form::open(array('url'=>'qualification/updateTrainingWorkOJT','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
						{{Form::hidden('id', $info->id)}}
						{{Form::hidden('old_file', $info->pdf)}}
						{{Form::hidden('category', $info->category)}}
					
					<div class="form-group required">
                                        
											{{Form::label('category', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('categorys', array('' => '--Select--', 'Training' => 'Training','OJT'=>'OJT', 'Seminar / Workshop / Meeting / Conference' => 'Seminar / Workshop / Meeting / Conference'), $info->category,array('class'=>'form-control','id'=>'category','required'=>'','disabled'=>'disabled'))}}
											</div>
											
                    </div>
					<!--IF training -->
					@if($info->category=='Training')
					<div id='training' >
					<div class="form-group">
                                        
											{{Form::label('type_of_training', 'Type of Training', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('type_of_training', array('' => '--Select--', 'Class Room'=>'Class Room','CBT'=>'CBT','Others'=>'Others'),$info->type_of_training,array('class'=>'form-control'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('training_course', 'Training Course / Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('training_course',$info->training_course, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('subject', 'Subject / Specialization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('subject',$info->subject, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					</div>
					@endif
					<!--end training -->
					<!--If workshop / seminar -->
					@if($info->category=='Seminar / Workshop / Meeting / Conference')
					<div id='workshop' > 
					<div class="form-group ">
                                           
											{{Form::label('topic', 'Topic', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('topic',$info->topic, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<!--end workshop / seminar -->
					</div>
					@endif
					<!--If OJT -->
					@if($info->category=='OJT')
					<div id='ojt' > 
						<div class="form-group ">
                                           
											{{Form::label('training_task', 'Training Task', array('class' => 'col-xs-4 control-label '))}}
											<div class="col-xs-6">
											{{Form::text('training_task',$info->training_task, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
						</div>
					</div>
					@endif
					<!--End OJT -->
					<!--Start Common content-->
						<div class="form-group required">												

													{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}										

													<div class="row">
														<div class="col-xs-2">
														{{Form::select('start_date',$dates,date('d'),array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
														</div>														
														<div class="col-xs-2">
															{{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
					</div>
					
					<div class="form-group required">												

													{{Form::label('end_date', 'End Date', array('class' => 'col-xs-4 control-label'))}}										

													<div class="row">
														<div class="col-xs-2">
														{{Form::select('end_date',$dates,date('d'),array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('end_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
														</div>														
														<div class="col-xs-2">
															{{Form::select('end_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
					</div>
					
					<div class="form-group ">
                                           
											{{Form::label('major_area', 'Major Area', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('major_area',$info->major_area, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('instructor', 'Instructor(s) Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor',$info->instructor, array('class' => 'form-control','placeholder'=>'i.e Inspector Name '))}}
											</div>
											
                    </div>
					
					<div class="form-group  ">
                                           
											{{Form::label('institute', 'Institute', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('institute',$info->institute, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group " >											
											{{Form::label('location', 'Location', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('location',$info->location, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											</div>
					</div>
				    <div class="form-group">
                                           
											{{Form::label('', 'Certificate Issued', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									   <label> {{ Form::radio('proof', 'Yes',Input::old('proof', $info->proof == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('proof', 'No',Input::old('proof', $info->proof == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
					
					
					<div class="form-group ">
                                           
                                            
											 {{ Form::label('pdf', 'Upload Updated Evidence ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ Form::file('pdf',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
											 
											 
											 </div>
                    </div>
					
					<!--End Common content-->
					
                    

                    <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-lg btn-block ">Save</button>
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endforeach
<!--Edit Pop up End-->




<!--End Training/workshop/ojt-->
<!--Start Language-->
<div class="row">
        <div class="col-md-12" id="approvalPendingLanguage">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Language</h3>
					
                </div>
                <!-- /.box-header -->
              
					<div class="box-body">
					@if($language)
					@foreach($language as $lang)
                    <table class="table table-bordered" id="{{$lang->id}}">
                        <tbody>
						{{Employee::notApproved($lang)}}	
                            <tr>
                                <th colspan='2'> Language  #{{++$sl4}} 
                                <span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))  
                                
								   
								{{ HTML::linkAction('QualificationController@deleteLanguage', '',array($lang->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                                 
								@endif

                                @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_language',$lang->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}

									 {{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_language',$lang->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif 


								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
									 <a data-toggle="modal" data-target="#{{'lang'.$lang->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                @endif
									
								</span>
								</th>
                            </tr>
                            <tr>
                                <td class='col-md-4'>Language</td>
                                <td>{{$lang->language}}</td>
                            </tr>
                            <tr>
                                <td>Speak</td>
                                <td>{{$lang->lang_speak}}</td>
                            </tr>
                            <tr>
                                <td>Understand</td>
                                <td> {{$lang->lang_understanding}}</td>
                            </tr>
                            <tr>
                                <td>Read</td>
                                <td>{{$lang->lang_reading}}</td>
                            </tr>
                            <tr>
                                <td>Write</td>
                                <td>{{$lang->lang_writing}}</td>
                            </tr>
                             <tr>
								<td colspan="2"><i>Created at : {{$lang->created_at}} | Updated at : {{$lang->updated_at}} </i></td>

							</tr>    
                        </tbody>
                    </table>
					@endforeach
					@else 
					<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
					</table>
					@endif
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
	<!--Start Update Pop up-->
	@foreach($language as $lang)
	 <div  class="modal fade" id="{{'lang'.$lang->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Language </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					{{Form::open(array('url'=>'qualification/updateLanguage','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
							{{Form::hidden('id',$lang->id)}}
                        <div class="form-group required">
                                           
											{{Form::label('language', 'Language', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('language',$lang->language, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                            </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_speak', 'Speaking ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_speak', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $lang->lang_speak,array('class'=>'form-control','id'=>'','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_understanding', 'Understanding', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_understanding', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $lang->lang_understanding,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_reading', 'Reading ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_reading', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $lang->lang_reading,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_writing', ' Writing ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_writing', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $lang->lang_writing,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
                       
                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                         
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	
	@endforeach
	<!--End Update Pop up-->
<!--End Language-->
<!--Start Technical licence-->
<div class="row">
        <div class="col-md-12" id="approvalPendingTechnicalLicence">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Technical License Record</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
					
					</div>
					<div class="box-body">
					@if($technical_licence)
					@foreach($technical_licence as $tl)
                    <table class="table table-bordered" id="{{$tl->id}}">
                        <tbody>
						{{Employee::notApproved($tl)}}	
                            <tr>
                                <th colspan='2'>LICENSE  #{{++$sl5}}
                                <span class='hidden-print'>
								
                                @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))    
                                
                                    
									
								{{ HTML::linkAction('QualificationController@deleteTechlicence', '',array($tl->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                                @endif 

                                @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))  
                                   
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_technical_licence',$tl->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}


									 {{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_language',$tl->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif 


								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
									 <a data-toggle="modal" data-target="#{{'TL'.$tl->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                @endif
									
									</span>
                                </th>
                            </tr>
                            <tr>
                                <td class='col-md-4'>Active</td>
                                <td >{{$tl->active}}</td>
                            </tr>
                            <tr>
                                <td>Licence Number</td>
                                <td>{{$tl->licence_no}}</td>
                            </tr>
                            <tr>
                                <td> Licence Type</td>
                                <td> {{$tl->licence_type}}</td>
                            </tr>
							<tr>
                                <td>Issue Date</td>
                                <td> {{$tl->issue_date.' '.$tl->issue_month.' '.$tl->issue_year}}</td>
                            </tr>
                            <tr>
                                <td>Expiration Date</td>
                                <td>{{$tl->expiration_date.' '.$tl->expiration_month.' '.$tl->expiration_year}}</td>
                            </tr>
                            <tr>
                                <td>Rating </td>
                                <td>{{$tl->rating}}</td>
                            </tr>

                             <tr>
								<td colspan="2"><i>Created at : {{$tl->created_at}} | Updated at : {{$tl->updated_at}} </i></td>

							</tr>  
							
                        </tbody>
                    </table>
					@endforeach
					@else 
					<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
					</table>
					@endif
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
		<!--Start Update Pop up-->
	@foreach($technical_licence as $tl)
	<div  class="modal fade" id="{{'TL'.$tl->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Technical License Record </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                  {{Form::open(array('url'=>'qualification/updateTechnicalLicence','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
					  {{Form::hidden('id',$tl->id)}}
                        <div class="form-group required">
                                           
											{{Form::label('', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> {{ Form::radio('active', 'Yes',Input::old('active', $tl->active=='Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No',Input::old('active', $tl->active == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('licence_no', 'Licence Number', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('licence_no',$tl->licence_no, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('licence_type', 'Licence Type', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('licence_type',$tl->licence_type, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
												
													{{Form::label('issue_date', 'Issue Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('issue_date',$dates, $tl->issue_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('issue_month',$months, $tl->issue_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('issue_year',$years, $tl->issue_year ,array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						<div class="form-group">
												
													{{Form::label('expiration_date', 'Expiration Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('expiration_date',$dates, $tl->expiration_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														
														{{Form::select('expiration_month',$months, $tl->expiration_month ,array('class'=>'form-control'))}}
															
														</div>
														<div class="col-xs-2">
															
															{{Form::select('expiration_year',$years_from, $tl->expiration_year ,array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						<div class="form-group " >											
											{{Form::label('rating', 'Rating', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('rating',$tl->rating , array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											</div>
					</div>
						
					
                       
                        <div class="form-group">
                            <div class="col-xs-5 col-xs-offset-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	@endforeach
	<!--End Update Pop up-->
<!--End Technical licence-->
<!--Start aircraft Qualification-->
<div class="row">
        <div class="col-md-12" id="approvalPendingAircraftQuali">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">CAA Employee Aircraft Qualification</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
					
					</div>
					<div class="box-body">
					@if($aircraft)
					@foreach($aircraft as $aircr)
                    <table class="table table-bordered"  id="{{$aircr->id}}">
                        <tbody>
						{{Employee::notApproved($aircr)}}	
                            <tr>
                                <th colspan='2'>Aircraft Qualification  #{{++$sl6}}
                                <span class='hidden-print'>
								
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))   									
									{{ HTML::linkAction('QualificationController@deleteAirQualification', '',array($aircr->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                                  
                                @endif 

                                @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))
								
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_aircraft',$aircr->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}

									 {{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_aircraft',$aircr->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif 

								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
                                
									 <a data-toggle="modal" data-target="#{{'AC'.$aircr->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                @endif
									
								</span>
                                </th>
                            </tr>
                             <tr>
                                <td class="col-md-4">Active</td>
                                <td >{{$aircr->active}}</td>
                            </tr>
                            <tr>
                                <td>License Type</td>
                                <td>{{$aircr->qualification_type}}</td>
                            </tr>
                            <tr>
                                <td>Total Hours</td>
                                <td>{{$aircr->total_hours}}</td>
                            </tr>
							<tr>
                                <td>Aircraft MM</td>
                                <td> {{$aircr->aircraft_mm}}</td>
                            </tr>
                            <tr>
                                <td>Aircraft MSN</td>
                                <td>{{$aircr->aircraft_msm}}</td>
                            </tr>
                            <tr>
                                <td>License Issue Date</td>
                                <td>{{$aircr->completion_date." ".$aircr->completion_month." ".$aircr->completion_year}}</td>
                            </tr>
							
							<tr>
                                <td>Organization</td>
                                <td>{{$aircr->institute}}</td>
                            </tr>
							<tr>
                                <td>Issuing Authority</td>
                                <td>{{$aircr->instructor}}</td>
                            </tr>
							<tr>
                                <td>License Validation</td>
                                <td>{{$aircr->proof}}</td>
                            </tr>
							
							<tr>
                                            <td>
												Uploaded Evidence :
											</td>
                                            <td>
										@if($aircr->pdf!='Null'){{HTML::link('files/AircraftQualification/'.$aircr->pdf,'Document',array('target'=>'_blank'))}}
											@else
												{{HTML::link('#','No Document Provided')}}
											@endif
                                            </td>
                                            
                            </tr>
							 <tr>
								<td colspan="2"><i>Created at : {{$aircr->created_at}} | Updated at : {{$aircr->updated_at}} </i></td>

							</tr> 
                        </tbody>
                    </table>
					@endforeach
					@else 
					<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
					</table>
					@endif
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
		<!--Start Update pop Up-->
@foreach($aircraft as $info)
	<div  class="modal fade" id="{{'AC'.$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
											{{Form::text('institute', $info->institute , array('class' => 'form-control','placeholder'=>''))}}
											</div>
                        </div>
						<div class="form-group ">
                                           
											{{Form::label('instructor', 'Issuing Authority', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('instructor',$info->instructor, array('class' => 'form-control','placeholder'=>''))}}
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
	<!--End Update pop Up-->
<!--End aircraft Qualification-->
<!--Start Employment history-->
 
                    <div class="row">
                        <div class="col-md-12" id="approvalPendingEmployment">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Employment History </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                @if($emplyment)
								@foreach($emplyment as $emply)
                                    <table class="table table-bordered" id="{{$emply->id}}">
                                        <tbody class="table-bordered">
										{{Employee::notApproved($emply)}}	
										<tr>                                           
                                            <th colspan='2'>Previous Employment #{{++$sl12}}

                                    <span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))    
                                  									
									{{ HTML::linkAction('QualificationController@deleteEmployment', '',array($emply->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                                @endif 

                                @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))
								
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_emplyment',$emply->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}

									 {{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_emplyment',$emply->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif 

								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
                                 <a data-toggle="modal" data-target="#{{'emp'.$emply->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
								@endif	
								    </span>
                                </th>
											</th>
                                        </tr>
                                        <tr>
											<td class="col-md-4" >Name of organization</td>
                                            <td>{{$emply->organisation_name}}</td>                     
                                        </tr>
                                        
										<tr>
                                           
                                            <td>
												Type of organization
											</td>
                                            <td>
                                               {{$emply->organisation_type}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                           
                                            <td>
												
												Address of organization:
											</td>
                                            <td>
                                             {{$emply->organisation_address}}
                                            </td>
                                            
                                        </tr> 
										<tr>
                                            <td>
												
												Designation
											</td>
                                            <td>
                                               {{$emply->designation}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>												
												Major responsibilities:
											</td>
                                            <td>
                                               {{$emply->responsibility}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>
												Name of supervisor:
											</td>
                                            <td>
                                               {{$emply->supervisor_name}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>
												Telephone of supervisor:
											</td>
                                            <td>
                                                 {{$emply->supervisor_phone}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>
												Date of joining:
											</td>
                                            <td>
                                                 {{$emply->start_date." ".$emply->start_month." ".$emply->start_year}}
                                            </td>
                                            
                                        </tr>
										<tr>
                                            <td>
												Date of Terminating:
											</td>
                                            <td>
                                                 {{$emply->end_date." ".$emply->end_month." ".$emply->end_year}}
                                            </td>
                                            
                                        </tr>
										
                                         <tr>
											<td colspan="2"><i>Created at : {{$emply->created_at}} | Updated at : {{$emply->updated_at}} </i></td>

										</tr>    
                                       
                                    </tbody></table>
									@endforeach
									@else
									<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
									</table>
									@endif
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                            </div>    
							<!--Start Edit pop up-->
@foreach($emplyment as $emply)
<div  class="modal fade" id="{{'emp'.$emply->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Employment Details </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->{{Form::open(array('url'=>'qualification/updateEmployment','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
					{{Form::hidden('id', $emply->id)}}
					<div class="form-group required">
                                           
											{{Form::label('organisation_name', 'Name Of Organisation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('organisation_name',$emply->organisation_name, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('organisation_type','Type of organization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('organisation_type', array('' => '--Select--', 'International' => 'International','Multinational'=>'Multinational','Government organization'=>'Government organization','Public limited company'=>'Public limited company','Private company'=>'Private company','Others'=>'Others'), $emply->organisation_type ,array('class'=>'form-control'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                        
											{{Form::label('organisation_address', 'Address of organization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('organisation_address',$emply->organisation_address, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('designation', 'Your designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('designation',$emply->designation, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('responsibility', 'Major responsibilities', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('responsibility',$emply->responsibility, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
												
													{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('start_date',$dates, $emply->start_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('start_month', $months,$emply->start_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('start_year',$years, $emply->start_year ,array('class'=>'form-control'))}}
														</div>
													</div>
					</div>
					<!--<div class="form-group">
                                           
											{{Form::label('', 'Till date', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::checkbox('name', 'value',array('id'=>'checkbox_check'))}}
											</div>
											
                    </div>-->
					<div class="form-group required">
												
													{{Form::label('end_date', 'End Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														
														{{Form::select('end_date',$dates,$emply->end_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														
															{{Form::select('end_month',$months,$emply->end_month,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															
																{{Form::select('end_year',$years,$emply->end_year,array('class'=>'form-control'))}}
															
														</div>
													</div>
					</div>
					
					 <div class="form-group required">
                                           
											{{Form::label('supervisor_name', ' Name of supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor_name',$emply->supervisor_name, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('supervisor_phone', 'Telephone of supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor_phone',$emply->supervisor_phone, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
                    

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endforeach
<!--End Edit pop up-->


<!--End Employment history-->

<!--Start Reference Qualification-->
<div class="row">
        <div class="col-md-12" id="approvalPendingReference">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Reference</h3>
                </div>
                <!-- /.box-header -->
               
					<div class="box-body">
					@if($reference)
					@foreach($reference as $ref)
                    <table class="table table-bordered" id="{{$ref->id}}">
                        <tbody>
						{{Employee::notApproved($ref)}}	
                            <tr>
                                <th colspan='2' >Reference  #{{++$sl7}}
                                <span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))   
                                     
									{{ HTML::linkAction('QualificationController@deleteReference', '',array($ref->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                                @endif 

                                @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))
								  									
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_reference',$ref->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}

									{{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_reference',$ref->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif 
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
                                	<a data-toggle="modal" data-target="#{{'R'.$ref->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
								@endif
								</span>
                                </th>
                            </tr>
                            <tr>
                                <td class="col-md-4">Referee Type</td>
                                <td >{{$ref->referee_type}}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{$ref->name}}</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td> {{$ref->designation}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{$ref->address}}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{$ref->telephone}}</td>
                            </tr>
							<tr>
                                <td>Email</td>
                                <td>{{$ref->email_address}}</td>
                            </tr>							
							<tr>
                                <td>Year Acquainted</td>
                                <td>{{$ref->years_acquainted}}</td>
                            </tr>
							<tr>
                                <td>May we request a reference</td>
                                <td>{{$ref->may_we_request}}</td>
                            </tr>
                             <tr>
								<td colspan="2"><i>Created at : {{$ref->created_at}} | Updated at : {{$ref->updated_at}} </i></td>

							</tr>
                        </tbody>
                    </table>
				@endforeach
				@else 
				<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
				</table>
				@endif

				
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
	<!--Update Pop up start-->
	@foreach($reference as $ref)
	<div  class="modal fade" id="{{'R'.$ref->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Reference </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                    {{Form::open(array('url'=>'qualification/updateReference','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
						{{Form::hidden('id',$ref->id)}}
						<div class="form-group required">
                                        
											{{Form::label('referee_type', 'Referee type', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('referee_type', array('' => '--Select--', 'Present supervisor' => 'Present supervisor','Past supervisor'=>'Past supervisor','Academic supervisor'=>'Academic supervisor'), $ref->referee_type ,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('name', 'Name', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('name',$ref->name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group ">
                                           
											{{Form::label('designation', ' Designation', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('designation', $ref->designation , array('class' => 'form-control','placeholder'=>''))}}
											</div>
                        </div>
						
						<div class="form-group">
											{{Form::label('address', ' Address', array('class' => 'col-xs-4 control-label'))}}
														
                                <div class="col-xs-6">
											{{Form::textarea('address', $ref->address , array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
								</div>
						</div>
						<div class="form-group ">
                                           
											{{Form::label('telephone', 'Telephone', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('telephone', $ref->telephone , array('class' => 'form-control','placeholder'=>''))}}
											</div>
                        </div>
						<div class="form-group ">
                                           
											{{Form::label('years_acquainted', '  Years acquainted', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('years_acquainted',$ref->years_acquainted, array('class' => 'form-control','placeholder'=>''))}}
											</div>
                        </div>
						<div class="form-group ">
                                           
											{{Form::label('email_address', 'E-mail address', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('email_address', $ref->email_address, array('class' => 'form-control','placeholder'=>''))}}
											</div>
                        </div>
						
						<div class="form-group ">
                                        
											{{Form::label('may_we_request', ' May we request a reference?', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('may_we_request', array('' => '--Select--', 'Yes' => 'Yes','No'=>'No'), $ref->may_we_request ,array('class'=>'form-control','id'=>''))}}
							</div>
                        </div>
					
                       
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                            </div>
                        </div>
					{{Form::close()}}
                </div>
            </div>
        </div>
    </div>


	@endforeach 
	<!--Update Pop up End-->
<!--End Reference Qualification-->
<!--Start Emp Verification-->
<div class="row">
        <div class="col-md-12" id="approvalPendingAssignment">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Employee Assignment</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
					
					</div>
					<div class="box-body">
					@if($verification)
					@foreach($verification as $veri)
                    <table class="table table-bordered" id="{{$veri->id}}">
                        <tbody>
						{{Employee::notApproved($veri)}}	
                            <tr>
                                <th colspan='2' id="task_{{$veri->id}}">Employee Assignment #{{++$ev}}
                                <span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))    
                               
                                   
									{{ HTML::linkAction('QualificationController@deleteEnpVeri', '',array($veri->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                                @endif  

                                 @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))
								
                                
                                   
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_employee_verification',$veri->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) 
									}}

									{{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_employee_verification',$veri->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
									@endif 
									@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))
									 <a data-toggle="modal" data-target="#{{'EV'.$veri->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    @endif
									
									</span>
                                </th>
                            </tr>
                            <tr>
                                <td>Active</td>
                                <td>{{$veri->active}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Name Of Assigned Task</td>
                                <td >{{$veri->name}}</td>
                            </tr>
                           
                            <tr>
                                <td>Details of Task </td>
                                <td>{{$veri->assigned_task}}</td>
                            </tr>
                            
                            <tr>
                                <td>Assigned By </td>
                                <td>{{$veri->assigned_by}}</td>
                            </tr>

                            <tr>
                                <td>Date Of Assigning</td>
                                <td>{{$veri->entry_date." ".$veri->entry_month." ".$veri->entry_year}}</td>
                            </tr>
							
                            <tr>
                                <td>Date of Completion</td>
                                  <td>{{$veri->termination_date." ".$veri->termination_month." ".$veri->termination_year}}</td>
                            </tr>
                            <tr>
                                <td>Position </td>
                                <td>{{$veri->position}}</td>
                            </tr>
                            
                           
							<tr>
                                <td>Note </td>
                                <td>{{$veri->note}}
								</td>
                            </tr>
							 <tr>
								<td colspan="2"><i>Created at : {{$veri->created_at}} | Updated at : {{$veri->updated_at}} </i></td>

							</tr>
                        </tbody>
                    </table>
					@endforeach
					@else 
					<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
					</table>
					@endif
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
	<!--Start Update Pop up area-->
	 @foreach($verification as $veri)
	 <div  class="modal fade" id="{{'EV'.$veri->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Employee  Assignment </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                 {{Form::open(array('url'=>'qualification/updateEmpVerification','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
					 {{Form::hidden('id',$veri->id)}}
					 <div class="form-group required">
                                           
											{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									 <label> {{ Form::radio('active', 'Yes',Input::old('active', $veri->active == 'Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No',Input::old('active', $veri->active == 'No'),array()) }} &nbsp  No</label>

									</div>
									
								</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('name', 'Name', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('name',$veri->name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
                        <div class="form-group required" >											
											{{Form::label('assigned_task', 'Details of Task', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('assigned_task',$veri->assigned_task, array('class' => 'form-control','placeholder'=>'','size'=>'4x1', 'required'=>''))}}
											</div>
					    </div>
						<div class="form-group required" >											
											{{Form::label('assigned_by', 'Assigned By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('assigned_by',$veri->assigned_by, array('class' => 'form-control','placeholder'=>'', 'required'=>''))}}
											</div>
					    </div>
						<div class="form-group required">
												
													{{Form::label('entry_date', 'Date of Assigning', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('entry_date',$dates, $veri->entry_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('entry_month',$months, $veri->entry_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('entry_year', $years, $veri->entry_year ,array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						
						<div class="form-group">
												
													{{Form::label('termination_date', 'Date of Completion', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
													
															{{Form::select('termination_date',$dates, $veri->termination_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														
														{{Form::select('termination_month',$months, $veri->termination_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															
															{{Form::select('termination_year', $years, $veri->termination_year ,array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						<div class="form-group ">
                                           
											{{Form::label('position', 'Position', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('position', $veri->position , array('class' => 'form-control','placeholder'=>''))}}
											</div>
                        </div>
						
						
						<div class="form-group " >											
											{{Form::label('note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('note', $veri->note , array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											</div>
					</div>
						
					
                       
                        <div class="form-group">
                            <div class="col-xs-5 col-xs-offset-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	@endforeach
	<!--End Update Pop up area-->
<!--End Emp Verification-->
<!--Start Other publications-->
<div class="row">
                        <div class="col-md-12" id="approvalPendingPublication">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Publication</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                @if($publication)
								@foreach($publication as $pub)
                                    <table class="table table-bordered" id="{{$pub->id}}">
                                        <tbody>
								{{Employee::notApproved($pub)}}
										<tr>                                           
                                            <th colspan='2'>Publication   #{{++$sl8}}
                                   <span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))    
                              
                                	
										
									{{ HTML::linkAction('QualificationController@deletePublication', '',array($pub->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                                @endif 
                                  @if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))  
									
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_others_publication',$pub->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) 
									}}

									{{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_others_publication',$pub->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}

								@endif

								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))

									<a data-toggle="modal" data-target="#{{'PUB'.$pub->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>

                                @endif

									
									</span>
											</th>
                                        </tr>
                                        <tr>
                                           
                                            <td class="col-md-4">{{$pub->title}}</td>
                                            <td >{{$pub->description}}</td>
                                            
                                        </tr>
                                         <tr>
											<td colspan="2"><i>Created at : {{$pub->created_at}} | Updated at : {{$pub->updated_at}} </i></td>

										</tr>
                                    </tbody>
									</table>
								@endforeach
								@else 
								<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
								</table>
								@endif
									  
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                            </div>   
							<!--Start Update POP UP For Publication-->
	@foreach($publication as $pub)
		<div class="modal fade" id="{{'PUB'.$pub->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Publication </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'qualification/updatePublication', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					{{Form::hidden('id',$pub->id)}}
					
				
					<div class="form-group required">
                                        
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$pub->title, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
											{{Form::label('description', 'Description', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('description',$pub->description, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
					</div>
					
					<div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	@endforeach
	<!--End Update POP UP-->
<!--End Other publications-->
<!--Start Other Membership-->
 <div class="row">
                        <div class="col-md-12" id="approvalPendingMembership">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Membership</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                @if($membership)
								@foreach($membership as $memb)
                                    <table class="table table-bordered" id="{{$memb->id}}">
                                        <tbody>
										{{Employee::notApproved($memb)}}
										<tr>                                           
                                            <th colspan='2'>Membership   #{{++$sl9}}
                                   <span class='hidden-print'>
									
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'par_delete'))    
                               
                                	
									{{ HTML::linkAction('QualificationController@deleteMembership', '',array($memb->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}

								@endif

								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'approve'))	
									
									{{ HTML::linkAction('QualificationController@approve', '',array('qualification_others_membership',$memb->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) 
									}}
									
									{{ HTML::linkAction('QualificationController@notApprove', '',array('qualification_others_membership',$memb->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif 


								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'update'))

									<a data-toggle="modal" data-target="#{{'M'.$memb->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                @endif
									
								</span>
											</th>
                                        </tr>
                                        <tr>
                                           
                                            <td class="col-md-4">{{$memb->title}}</td>
                                            <td >{{$memb->description}}</td>
                                            
                                        </tr>
                                         <tr>
											<td colspan="2"><i>Created at : {{$memb->created_at}} | Updated at : {{$memb->updated_at}} </i></td>

										</tr>
                                    </tbody>
									</table>
								@endforeach
								@else 
								<table class="table table-bordered">
										<tr>
											<td colspan="2">Data Not Provided</td>
										</tr>
								</table>
								@endif

                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                            </div>
							<!--Start Update POP UP For Membership-->
	@foreach($membership as $memb)
	<div  class="modal fade" id="{{'M'.$memb->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Membership </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
              {{Form::open(array('url' => 'qualification/updateMembership', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
				
					{{Form::hidden('id',$memb->id)}}
					<div class="form-group required">
                                        
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$memb->title, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
											{{Form::label('description', 'Description', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('description',$memb->description, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
					</div>
					
					<div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	@endforeach
	<!--End Update POP UP For Membership-->
<!--End Other Membership-->

@include('common')
@yield('print')
@stop