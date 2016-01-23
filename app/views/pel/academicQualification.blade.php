@extends('layout')
@section('content')
 <section class="content widthController">
 <div style="display: none">{{$num=0;}}</div>
 
       <div class="row">
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
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))
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
                           
							
							
						

<!--Button for popup-->
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#EmploymentDetails">Add New Academic Qualification</button>
	
</p>
<!-- start of oppup content-->
<div class="modal fade" id="EmploymentDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Academic Qualification </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'pel/saveAccademic', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					<div class="form-group required">
                                        
											{{Form::label('level', 'Level [highest degree first]', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('level', array('Null' => '--Select--', 'Post Doctorate or Equivalent' => 'Post Doctorate or Equivalent','Doctorate'=>'Doctorate','Masters or Equivalent'=>'Masters or Equivalent','Bachelors or Equivalent'=>'Bachelors or Equivalent','Diploma'=>'Diploma','H.S.C. or Equivalent'=>'H.S.C. or Equivalent','S.S.C. or Equivalent'=>'S.S.C. or Equivalent','Below S.S.C.'=>'Below S.S.C.'), 0,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					
				
					<div class="form-group required">
                                        
											{{Form::label('', ' Name of degree', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('name_of_degree','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('discipline', 'Discipline', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('discipline', array('Null' => '--Select--', 'Arts' => 'Arts','Science'=>'Science','Commerce'=>'Commerce','Biological Science'=>'Biological Science','Business Studies/ Administration'=>'Business Studies/ Administration','Engineering/ Technology/ Applied Science'=>'Engineering/ Technology/ Applied Science','Medical Science'=>'Medical Science','Social Science'=>'Social Science'), null,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('specialization', 'Specialization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('specialization','', array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('institute', 'Educational institute', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('institute','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('pussing_year', ' Passing year', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('pussing_year', $year, '01', array('class' => 'form-control','placeholder'=>'')) }}
											
											</div>
											
                    </div>
					<div class="form-group required">
					{{Form::label('', 'Result', array('class' => 'col-xs-4 control-label'))}}
					<div class="row">
														<div class="col-xs-3">
														{{Form::select('standard', array('Null' => '--Select--', 'Grade' => 'Grade','CGPA'=>'CGPA','Division'=>'Division','Class'=>'Class','Percentage'=>'Percentage'), '0',array('class'=>'form-control','id'=>'Standard','required'=>''))}}
														</div>
														<div class="col-xs-2">												
														{{Form::text('grade_division','', array('class' => 'form-control','placeholder'=>'grade or division','required'=>''))}}
														</div>
														<div class="col-xs-2">
															{{Form::text('out_of','', array('class' => 'form-control','placeholder'=>'out of','disabled'=>'','id'=>'out_of'))}}
														</div>
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
</section>
<section class="content widthController">
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
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))
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
                           
							
							
						

<!--Button for popup-->
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#Thesis">Add New Thesis/Project/Internship/Dissertation</button>
	
</p>
<!-- start of oppup content-->
<div class="modal fade" id="Thesis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thesis/Project/Internship/Dissertation </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'pel/saveAccaThesis','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				

					
					<div class="form-group required">
                                        
											{{Form::label('level', ' Degree level', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('level', array('Null' => '--Select--', 'Doctorate' => 'Doctorate','Masters or Equivalent'=>'Masters or Equivalent','Bachelors or Equivalent'=>'Bachelors or Equivalent'), null,array('class'=>'form-control','id'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('type', 'Type ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('type', array('Null' => '--Select--', 'Thesis' => 'Thesis','Project'=>'Project','Internship'=>'Internship','Dissertation'=>'Dissertation'), null,array('class'=>'form-control','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('institute', 'Institute', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('institute','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					 
					<div class="form-group required">
                                           
											{{Form::label('duration', 'Duration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('duration','', array('class' => 'form-control','placeholder'=>'i.e 1 day or 1 Month or 1 Year ','required'=>''))}}
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
	<!--Edit option For Academic Qualification-->
	
	@include('pel.editForm')
	@yield('updateAccademicQali')
	<!--End Edit option For Thesis Qualification-->
</section>




@stop