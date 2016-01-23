@extends('layout')
@section('content')
<section class='content widthController'>

<!--Personal Info-->
	
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
					@if($PersonalInfos)
					@foreach($PersonalInfos as $info)
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
<!--End Of Personal Info-->

<!--Accademy -->
 <div class="row">
  <div style="display: none">{{$num=0;}}</div>
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Academic Qualification  </h3>
                                </div><!--/.box-header -->
                                <div class="box-body">
								@if($accas)
									
								@foreach($accas as $acca)								
									
                               <table class="table table-bordered">
                                        <tbody>
																		
										<tr>                                           
                                            <th colspan='2' >Academic Qualification   #{{++$num}}
											
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_accademy',$acca->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'sof_delete'))
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_accademy',$acca->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_accademy',$acca->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_accademy',$acca->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_accademy',$acca->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('pel_accademy',$acca->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#pelAccademy{{$acca->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
							     
							  </span>
											</th>
                                        </tr>
                                        @if($acca->approve=='0')
										  <tr>
											<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($acca)}}</th>	
										 </tr>
										 @endif
										 @if($acca->warning=='1')
											 <tr  >
											 <th colspan='2'>{{AircraftPrimaryInfo::warning($acca)}}	</th>
											 </tr>  
										 @endif	
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
                                    </tbody>
                                    </table>
									@endforeach
									
									@else
									<table class="table table-bordered">
										<tr><td>No Data Is Provided Yet!!</td></tr>
									</table>
									@endif
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
    </div>  
    <!---End Accademy-->
    <!--Thesis-->
	 <div style="display: none">{{$num=0;}}</div>
 
                    <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Thesis/Project/Internship/Dissertation  </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                @if($thesis)
								@foreach($thesis as $thes)
                                    <table class="table table-bordered">
                                        <tbody>
											
										<tr>                                           
                                            <th colspan='2'>Thesis/Project/Internship/Dissertation    #{{++$num}}
											<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_acca_thesis',$thes->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'sof_delete'))
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_acca_thesis',$thes->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_acca_thesis',$thes->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_acca_thesis',$thes->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_acca_thesis',$thes->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('pel_acca_thesis',$thes->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#pelAccaThesis{{$thes->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
							     
							  </span>
									</th>
                                        </tr>
                                        @if($thes->approve=='0')
										  <tr>
											<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($thes)}}</th>	
										 </tr>
										 @endif
										 @if($thes->warning=='1')
											 <tr  >
											 <th colspan='2'>{{AircraftPrimaryInfo::warning($thes)}}	</th>
											 </tr>  
										 @endif	
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
										                            
                                       
                                    </tbody></table>
									@endforeach
									@else
									<table class="table table-bordered">
										<tr><td>No Data Is Provided Yet!!</td></tr>
									</table>
									@endif
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
    </div>    
    <!--End THesis-->

    <!--Language-->
    <div style="display:none">{{$num=0;}}</div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Language Proficiency</h3>
                </div>
                <!-- /.box-header -->
					<div class="box-body">
                    @if($languages)
					@foreach($languages as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                                <th colspan='2'> Language  #{{++$num}}
                                    <span class='hidden-print'>
                              @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))    
                                    {{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                              @endif
                              @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'sof_delete'))
                                    {{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                               @endif
                                    
                                    
                            @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve')) 
                                  
                                    {{ HTML::linkAction('AircraftController@approve', '',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
                                
                                    
                                    {{ HTML::linkAction('AircraftController@notApprove', '',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
                                @endif
                            @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning')) 
                                    {{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
                                    {{ HTML::linkAction('AircraftController@warning', '',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
                                @endif
                                @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))  
                                     <a data-toggle="modal" data-target="#pelLangProfe{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                                             <th colspan='2'>{{AircraftPrimaryInfo::warning($info)}}    </th>
                                             </tr>  
                                         @endif 
                            <tr>
                                <td class='col-md-4'>Language</td>
                                <td>{{$info->language}}</td>
                            </tr>
                            <tr>
                                <td>Speak</td>
                                <td>{{$info->lang_speak}}</td>
                            </tr>
                            <tr>
                                <td>Understand</td>
                                <td> {{$info->lang_understanding}}</td>
                            </tr>
                            <tr>
                                <td>Read</td>
                                <td>{{$info->lang_reading}}</td>
                            </tr>
                            <tr>
                                <td>Write</td>
                                <td>{{$info->lang_writing}}</td>
                            </tr>
                        </tbody>
                    </table>
					@endforeach
                    @else
                    <table class="table table-bordered">
                        <tr><td>No Data Is Provided Yet!!!</td></tr>
                    </table>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!--End Language-->
    <!--Designee Records-->
    <div style="display: none">{{$num=0}}</div>       
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Designee Records</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($designeeRecords)
					@foreach($designeeRecords as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>Designee Record{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('pel_designee_record',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateDesigneeRecords{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                                <td>Designation Type</td>
                                <td>{{$info->designation_type}}</td>
                            </tr>
                            <tr>
                                <td>Designation Category</td>
                                <td> {{$info->designation_category}}</td>
                            </tr>
                            <tr>
                                <td>Business Address</td>
                                <td>{{$info->business_address}}</td>
                            </tr>
                            <tr>
                                <td>Organization</td>
                                <td>{{$info->organization}}</td>
                            </tr>
							<tr>
                                <td>Aircraft</td>
                                <td>{{$info->aircraft}}</td>
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
                                <td>Function</td>
                                <td>{{$info->function}}</td>
                            </tr>
							<tr>
                                <td>Limitation</td>
                                <td>{{$info->limitation}}</td>
                            </tr>
							<tr>
                                <td>File</td>
                                <td>@if($info->file!='Null'){{HTML::link('files/pelDesigneeRecord/'.$info->file,'File',array('target'=>'_blank'))}}
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

    <!--End Designee Records-->

    <!--Medical Certifications-->
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
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_medical_certification',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_medical_certification',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
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
    <!--End Medical Certifications-->
    <!--License General Info-->
    <div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">License General Info.</h3>
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
    <!--End License General Info-->
    <!--Flying Details-->
    <div class="row" >
<div style="display: none">{{$num=0}}</div>
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Flying Details</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($flyingDetails)
					@foreach($flyingDetails as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>Flying Detail #{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}

									{{ HTML::linkAction('AircraftController@warning', '',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateFlyingDetails{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
									Date
								</td>
                                <td>{{$info->date.' '.$info->month.' '.$info->year}}</td>
                            </tr>
                            <tr>
                                <td>									
									Local Time
								</td>
                                <td>{{$info->local_time}}</td>
                            </tr>
                            <tr>
                                <td>									
									Sun Rise
								</td>
                                <td>{{$info->sun_rise}}</td>
                            </tr>
                            <tr>
                                <td>									
									Sun Set
								</td>
                                <td>{{$info->sun_set}}</td>
                            </tr>
                            <tr>
                                <td>									
									Flight Number
								</td>
                                <td>{{$info->flight_number}}</td>
                            </tr>
                            <tr>
                                <td>									
									Pairing
								</td>
                                <td>{{$info->pairing}}</td>
                            </tr>
                            <tr>
                                <td>									
									Departure Airfield
								</td>
                                <td>{{$info->departure_airfield}}</td>
                            </tr>
                            <tr>
                                <td>									
									Arrival Airfield
								</td>
                                <td>{{$info->arrival_airfield}}</td>
                            </tr>
                            <tr>
                                <td>									
									Off Block
								</td>
                                <td>{{$info->off_block}}</td>
                            </tr>
                            <tr>
                                <td>									
									On Block
								</td>
                                <td>{{$info->on_block}}</td>
                            </tr>
                            <tr>
                                <td>									
									Flight
								</td>
                                <td>{{$info->flight}}</td>
                            </tr>
                            <tr>
                                <td>									
									PIC/P1
								</td>
                                <td>{{$info->pic_p1}}</td>
                            </tr>
                            <tr>
                                <td>									
									Co-Pilot/P2
								</td>
                                <td>{{$info->co_pilot_p2}}</td>
                            </tr>
                            <tr>
                                <td>									
									Relief Pilot/R
								</td>
                                <td>{{$info->relief_pilot_r}}</td>
                            </tr>
                            <tr>
                                <td>									
									Dual
								</td>
                                <td>{{$info->dual}}</td>
                            </tr>
                            <tr>
                                <td>									
									Instructor
								</td>
                                <td>{{$info->instructor}}</td>
                            </tr>
                            <tr>
                                <td>									
									Examiner
								</td>
                                <td>{{$info->examiner}}</td>
                            </tr>
                            <tr>
                                <td>									
									Night
								</td>
                                <td>{{$info->night}}</td>
                            </tr>
                            <tr>
                                <td>									
									IFR
								</td>
                                <td>{{$info->ifr}}</td>
                            </tr>
                            <tr>
                                <td>									
									Sim Instructor
								</td>
                                <td>{{$info->sim_instructor}}</td>
                            </tr>
                            <tr>
                                <td>									
									Cross Country
								</td>
                                <td>{{$info->cross_country}}</td>
                            </tr>
                            <tr>
                                <td>									
									Approach Landing
								</td>
                                <td>{{$info->approach_landing}}</td>
                            </tr>
                            <tr>
                                <td>									
									Flight Time (view only)
								</td>
                                <td>{{$info->flight_time_view_only}}</td>
                            </tr>
                          
							<tr>
                                <td>Last 3 Flying Dates (View Only)</td>
                                <td>{{$info->date_1.' '.$info->month_1.' '.$info->year_1.'</br>'.$info->date_2.' '.$info->month_2.' '.$info->year_2.'</br>'.$info->date_3.' '.$info->month_3.' '.$info->year_3}}</td>
                            </tr>

                            <tr>
                                <td>									
									Flight Time Limits
								</td>
                                <td>{{$info->flight_time_limits}}</td>
                            </tr>

                            <tr>
                                <td>									
									Aircraft MSN
								</td>
                                <td>{{$info->aircraft_msn}}</td>
                            </tr>

                            <tr>
                                <td>									
									Aircraft Registration Number
								</td>
                                <td>{{$info->aircraft_registration_number}}</td>
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
    <!--End Flying Details-->
    <!--Simulator-->
    <div style="display: none">{{$num=0;}}</div>
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Simulator</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($simulatorHistorys)
					@foreach($simulatorHistorys as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>Simulator #{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateSimulator{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                                <td>Date</td>
                                <td>{{$info->date.' '.$info->month.' '.$info->year}}</td>
                            </tr>
							
							<tr>
                                <td>Model</td>
                                <td>{{$info->model}}</td>
                            </tr>
							<tr>
                                <td>Registration</td>
                                <td>{{$info->registration}}</td>
                            </tr>
							<tr>
                                <td>Location</td>
                                <td>{{$info->location}}</td>
                            </tr>
							<tr>
                                <td>Other Crew/Instructor</td>
                                <td>{{$info->other_crew_instructor}}</td>
                            </tr>
							<tr>
                                <td>Type Of Instruction</td>
                                <td>{{$info->type_of_instruction}}</td>
                            </tr>
							<tr>
                                <td>FFS(HR)</td>
                                <td>{{$info->FFS_HR}}</td>
                            </tr>
							<tr>
                                <td>FNPT-I(HR)</td>
                                <td>{{$info->FNPT_1_HR}}</td>
                            </tr>
							<tr>
                                <td>FNPT-II(HR)</td>
                                <td>{{$info->FNPT_II_HR}}</td>
                            </tr>
							<tr>
                                <td>CSS(HR)</td>
                                <td>{{$info->CSS_HR}}</td>
                            </tr>
							<tr>
                                <td>Instruction(HR)</td>
                                <td>{{$info->instruction_HR}}</td>
                            </tr>
							<tr>
                                <td>Exam(HR)</td>
                                <td>{{$info->exam_HR}}</td>
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
    <!--End Simulator-->
    <!--Training Details-->
    <div style="display:none">{{$num=0}}</div>
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Training Details</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($trainingDetails)
					@foreach($trainingDetails as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>Training Detail#{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}

									{{ HTML::linkAction('AircraftController@warning', '',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateTrainingDetails{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
									Name Of The Course
								</td>
                                <td>{{$info->name_of_the_course}}</td>
                            </tr>
                            <tr>
                                <td>									
									Name Of The Institute
								</td>
                                <td>{{$info->name_of_the_institute}}</td>
                            </tr>
                          
							<tr>
                                <td>Start Date</td>
                                <td>{{$info->start_date.' '.$info->start_month.' '.$info->start_year}}</td>
                            </tr>
							<tr>
                                <td>End Date</td>
                                <td>{{$info->end_date.' '.$info->end_month.' '.$info->end_year}}</td>
                            </tr>
							<tr>
                                <td>Certificate Issue Date</td>
                                <td>{{$info->certificate_issue_date.' '.$info->certificate_issue_month.' '.$info->certificate_issue_year}}</td>
                            </tr>
							<tr>
                                <td>Certificate Issue Date</td>
                                <td>{{$info->expiration_date.' '.$info->expiration_month.' '.$info->expiration_year}}</td>
                            </tr>
							<tr>
                                <td>Duration</td>
                                <td>{{$info->duration}}</td>
                            </tr>
							
							<tr>
                                <td>File</td>
                                <td>@if($info->file!='Null'){{HTML::link('files/pelTrainingDetails/'.$info->file,'File',array('target'=>'_blank'))}}
													@else
														{{HTML::link('#','No FIle  Is Provided')}}
													@endif</td>
                            </tr>
							<tr>
                                <td>Approved By</td>
                                <td>{{$info->approved_by}}</td>
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
    <!--End Training Details-->
    <!--AME Log Details-->
    <div class="row" >
<div style="display: none">{{$num=0}}</div>
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">AME Log Details</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($ameLogs)
					@foreach($ameLogs as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>AMR Log #{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}

									{{ HTML::linkAction('AircraftController@warning', '',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateAmeLogDetails{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
									Index Number
								</td>
                                <td>{{$info->index_number}}</td>
                            </tr>
                            <tr>
                                <td>									
									ATA Chapter
								</td>
                                <td>{{$info->ata_chapter}}</td>
                            </tr>
                            <tr>
                                <td>									
									Part-66 Module
								</td>
                                <td>{{$info->part_66_module}}</td>
                            </tr>
                            <tr>
                                <td>									
									Task Competence Group (p-66)
								</td>
                                <td>{{$info->task_competence_group_p_66}}</td>
                            </tr>
                            <tr>
                                <td>									
									Task Competence Details (p-66)
								</td>
                                <td>{{$info->task_competence_details_p_66}}</td>
                            </tr>
                            <tr>
                                <td>									
									Basic Skill Title
								</td>
                                <td>{{$info->basic_skill_title}}</td>
                            </tr>
                            <tr>
                                <td>									
									Basic Skill Task
								</td>
                                <td>{{$info->basic_skill_task}}</td>
                            </tr>
                            <tr>
                                <td>									
									Maintenance Task Title
								</td>
                                <td>{{$info->maintenance_task_title}}</td>
                            </tr>
                            <tr>
                                <td>									
									Maintenance Task Details
								</td>
                                <td>{{$info->maintenance_task_details}}</td>
                            </tr>
                            <tr>
                                <td>									
									Aircraft MSN
								</td>
                                <td>{{$info->aircraft_msn}}</td>
                            </tr>
                            <tr>
                                <td>									
									Workshop
								</td>
                                <td>{{$info->workshop}}</td>
                            </tr>
                            <tr>
                                <td>									
									Work Order
								</td>
                                <td>{{$info->work_order}}</td>
                            </tr>
                            <tr>
                                <td>									
									Supervisor/Instructor/ Assessor/Company
								</td>
                                <td>{{$info->supervisor_instructor_assessor_company}}</td>
                            </tr>
                          
							<tr>
                                <td>Date</td>
                                <td>{{$info->date.' '.$info->month.' '.$info->year}}</td>
                            </tr>

                            <tr>
                                <td>									
									Hour Details
								</td>
                                <td>{{$info->hour_details}}</td>
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

    <!--End AME Log Details-->
    <!--License History-->

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
    <!--End License History-->

    <!--Loogbook Review-->
    <div style="display: none">{{$num=0;}}</div>
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Logbook Reviews</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($logbookRecords)
					@foreach($logbookRecords as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>Logbook Review #{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_logbook_review',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_logbook_review',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_logbook_review',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_logbook_review',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_logbook_review',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('pel_logbook_review',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateLogbookReview{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                                <td>Date Of Review</td>
                                <td>{{$info->review_date.' '.$info->review_month.' '.$info->review_year}}</td>
                            </tr>
							
							<tr>
                                <td>Purpose Of Review</td>
                                <td>{{$info->purpose_of_review}}</td>
                            </tr>
							<tr>
                                <td>Flight Time</td>
                                <td>{{$info->flight_time}}</td>
                            </tr>
							<tr>
                                <td>Memo/Notes</td>
                                <td>{{$info->memo_notes}}</td>
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
    <!--End Loogbook Review-->


@include('common')
@yield('print')

@include('pel.editForm')
	@yield('updatePersonalInfo')
	@yield('updateAccademicQali')
	@yield('updateLanguagePro')
	@yield('designeeRecordUpdate') 	
	@yield('updateMedicalCertification') 	
	@yield('updateLicenseHistory') 	
	@yield('updateLogbookReview') 	
	@yield('updateSimulator')	
	@yield('updategeneralInfo')	
	@yield('updatetrainingDetails')	
	@yield('updateameLogDetails')	
    @yield('updateFlyingDetails') 


</section>
	
@stop