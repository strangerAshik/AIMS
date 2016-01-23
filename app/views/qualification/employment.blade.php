@extends('layout')

@section('content')

 <section class="content contentWidth">

                    <div class="row">

                        <div class="col-md-12">

							<div class="box box-primary">

                                <div class="box-header">

                                    <h3 class="box-title">Employment History </h3>

                                </div><!-- /.box-header -->

                                <div class="box-body">

								@foreach($infos as $info)

                                    <table class="table table-bordered">

                                        <tbody class="table-bordered">

										{{Employee::notApproved($info)}}	

										<tr>                                           

                                            <th colspan='2'>Previous Employment #{{++$a_sl}}

											<a onclick=" return confirm('Wanna Delete?')"  href="{{'deleteEmployment/'.$info->id}}" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span></a>

											

											<a data-toggle="modal" data-target="#{{'emp'.$info->id}}" href='' style='color:green;float:right;padding:5px;'>

                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

                                    </a>

											</th>

                                        </tr>

                                        <tr>

											<td class="col-md-4" >Name of organization</td>

                                            <td>{{$info->organisation_name}}</td>                     

                                        </tr>

                                        

										<tr>

                                           

                                            <td>

												Type of organization

											</td>

                                            <td>

                                               {{$info->organisation_type}}

                                            </td>

                                            

                                        </tr>

										<tr>

                                           

                                            <td>

												

												Address of organization:

											</td>

                                            <td>

                                             {{$info->organisation_address}}

                                            </td>

                                            

                                        </tr> 

										<tr>

                                            <td>

												

												Designation

											</td>

                                            <td>

                                               {{$info->designation}}

                                            </td>

                                            

                                        </tr>

										<tr>

                                            <td>												

												Major responsibilities:

											</td>

                                            <td>

                                               {{$info->responsibility}}

                                            </td>

                                            

                                        </tr>

										<tr>

                                            <td>

												Name of supervisor:

											</td>

                                            <td>

                                               {{$info->supervisor_name}}

                                            </td>

                                            

                                        </tr>

										<tr>

                                            <td>

												Telephone of supervisor:

											</td>

                                            <td>

                                                 {{$info->supervisor_phone}}

                                            </td>

                                            

                                        </tr>

										<tr>

                                            <td>

												Date of joining:

											</td>

                                            <td>

                                                 {{$info->start_date." ".$info->start_month." ".$info->start_year}}

                                            </td>

                                            

                                        </tr>

										<tr>

                                            <td>

												Date of posting/ release:

											</td>

                                            <td>

                                                 {{$info->end_date." ".$info->end_month." ".$info->end_year}}

                                            </td>

                                            

                                        </tr>

										

                                            

                                       

                                    </tbody></table>

									@endforeach

                                </div><!-- /.box-body -->

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

                <h4 class="modal-title">Employment Details </h4>

            </div>



            <div class="modal-body">

                <!-- The form is placed inside the body of modal -->

                

				{{Form::open(array('url'=>'qualification/saveEmploymentHistory','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}



					<div class="form-group required">

                                           

											{{Form::label('organisation_name', 'Name Of Organisation', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::text('organisation_name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}

											</div>

											

                    </div>

					<div class="form-group required">

                                        

											{{Form::label('organisation_type', 'Type of organization', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::select('organisation_type', array('' => '--Select--', 'International' => 'International','Multinational'=>'Multinational','Government organization'=>'Government organization','Public limited company'=>'Public limited company','Private company'=>'Private company','Others'=>'Others'), null,array('class'=>'form-control','required'=>''))}}

											</div>

											

                    </div>

					<div class="form-group">

                                        

											{{Form::label('organisation_address', 'Address of organization', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::textarea('organisation_address','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}

											</div>

											

                    </div>

					

					<div class="form-group required">

                                           

											{{Form::label('designation', 'Your designation', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::text('designation','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}

											</div>

											

                    </div>

					

					<div class="form-group required">

                                        

											{{Form::label('responsibility', 'Major responsibilities', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::textarea('responsibility','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3','required'=>''))}}

											</div>

											

                    </div>

					

					<div class="form-group required">

												

													{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}

												

													<div class="row">

														<div class="col-xs-2">

														{{Form::select('start_date',$dates,'0',array('class'=>'form-control','required'=>''))}}

														</div>

														<div class="col-xs-3">

														{{Form::select('start_month',$months,'0',array('class'=>'form-control','required'=>''))}}

											

															

														</div>

														<div class="col-xs-2">

															{{Form::select('start_year',$years,'01',array('class'=>'form-control','required'=>''))}}

														</div>

													</div>

					</div>

					<!--<div class="form-group">

                                           

											{{Form::label('', 'Till date', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::checkbox('name', 'value',array('id'=>'checkbox_check'))}}

											</div>

											

                    </div>-->

					<div class="form-group ">

												

													{{Form::label('end_date', 'Date of posting / Release', array('class' => 'col-xs-4 control-label'))}}

												

													<div class="row">

														<div class="col-xs-2">

														

														{{Form::select('end_date',$dates,'0',array('class'=>'form-control'))}}

														</div>

														<div class="col-xs-3">

														

															{{Form::select('end_month',$months,'0',array('class'=>'form-control'))}}

											

															

														</div>

														<div class="col-xs-2">

															

																{{Form::select('end_year',$years,'01',array('class'=>'form-control'))}}

															

														</div>

													</div>

					</div>

					

					 <div class="form-group required">

                                           

											{{Form::label('supervisor_name', ' Name of supervisor', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::text('supervisor_name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}

											</div>

											

                    </div>

					<div class="form-group">

                                           

											{{Form::label('supervisor_phone', 'Telephone of supervisor', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::text('supervisor_phone','', array('class' => 'form-control','placeholder'=>''))}}

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

<!------------------Start Edit pop up-------------------------->

@foreach($infos as $info)

<div class="modal fade" id="{{'emp'.$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Employment Details </h4>

            </div>



            <div class="modal-body">

                <!-- The form is placed inside the body of modal -->{{Form::open(array('url'=>'qualification/updateEmployment','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}

					{{Form::hidden('id', $info->id)}}

					<div class="form-group required">

                                           

											{{Form::label('organisation_name', 'Name Of Organisation', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::text('organisation_name',$info->organisation_name, array('class' => 'form-control','placeholder'=>''))}}

											</div>

											

                    </div>

					<div class="form-group required">

                                        

											{{Form::label('organisation_type','Type of organization', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::select('organisation_type', array('' => '--Select--', 'International' => 'International','Multinational'=>'Multinational','Government organization'=>'Government organization','Public limited company'=>'Public limited company','Private company'=>'Private company','Others'=>'Others'), $info->organisation_type ,array('class'=>'form-control'))}}

											</div>

											

                    </div>

					<div class="form-group">

                                        

											{{Form::label('organisation_address', 'Address of organization', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::textarea('organisation_address',$info->organisation_address, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}

											</div>

											

                    </div>

					

					<div class="form-group required">

                                           

											{{Form::label('designation', 'Your designation', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::text('designation',$info->designation, array('class' => 'form-control','placeholder'=>''))}}

											</div>

											

                    </div>

					

					<div class="form-group required">

                                        

											{{Form::label('responsibility', 'Major responsibilities', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::textarea('responsibility',$info->responsibility, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}

											</div>

											

                    </div>

					

					<div class="form-group required">

												

													{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}

												

													<div class="row">

														<div class="col-xs-2">

														{{Form::select('start_date',$dates, $info->start_date ,array('class'=>'form-control'))}}

														</div>

														<div class="col-xs-3">

														{{Form::select('start_month', $months,$info->start_month ,array('class'=>'form-control'))}}

											

															

														</div>

														<div class="col-xs-2">

															{{Form::select('start_year',$years, $info->start_year ,array('class'=>'form-control'))}}

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

												

													{{Form::label('end_date', 'Date of posting / Release', array('class' => 'col-xs-4 control-label'))}}

												

													<div class="row">

														<div class="col-xs-2">

														

														{{Form::select('end_date',$dates,$info->end_date,array('class'=>'form-control'))}}

														</div>

														<div class="col-xs-3">

														

															{{Form::select('end_month',$months,$info->end_month,array('class'=>'form-control'))}}

											

															

														</div>

														<div class="col-xs-2">

															

																{{Form::select('end_year',$years,$info->end_year,array('class'=>'form-control'))}}

															

														</div>

													</div>

					</div>

					

					 <div class="form-group required">

                                           

											{{Form::label('supervisor_name', ' Name of supervisor', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::text('supervisor_name',$info->supervisor_name, array('class' => 'form-control','placeholder'=>''))}}

											</div>

											

                    </div>

					<div class="form-group">

                                           

											{{Form::label('supervisor_phone', 'Telephone of supervisor', array('class' => 'col-xs-4 control-label'))}}

											<div class="col-xs-6">

											{{Form::text('supervisor_phone',$info->supervisor_phone, array('class' => 'form-control','placeholder'=>''))}}

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

<!------------------End Edit pop up-------------------------->

<script>



</script>







@stop