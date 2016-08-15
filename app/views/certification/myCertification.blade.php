@extends('layout')
@section('content')
<section class="content contentWidth">
	<div class='row col-md-12 hidden-print'>
			
				@if('true'==CommonFunction::hasPermission('edp_approval',Auth::user()->emp_id(),'entry'))
				<p class="text-center col-md-12">
				<button class="btn btn-primary  btn-block"   data-toggle="modal" data-target="#newCertification">&nbsp Pin A Certification</button>
				</p>
				@endif
		
 	</div>

 	<!--Table of my certification-->
 	<div class="row">
                        <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Organization Certification</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="examples" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Certificate Number</th>
                                                <th>Organization</th>
                                                <th>Initialize Date</th>
                                                <th>Next Renewal Date</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                         @foreach($certificates as $info)
                                       		<tr>
                                       			<td>{{++$num}}</td>
                                       			<td>CERTI-{{$info->id}}</td>
                                       			<td>{{$info->organization}}</td>
                                       			<td>{{$info->date}}</td>
                                       			<td>{{$info->renewal_date}}</td>
                                       			<td>{{$info->title}}</td>
                                       			<td>{{$info->category}}</td>
                                       			<th>
                                       			<a  class="hidden-print" data-target="#cer_{{$info->id}}" data-toggle="modal"  style="color:green; cursor: pointer;" >Edit </a>

												

                                       			</th>
                                       			<td>
                                       			  {{ HTML::linkAction('BaseController@permanentDelete', '',array('certificate_pin',$info->id,"#"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;text-align:center','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}  
                                       			</td>
                                       			
                                       			<td><a href="{{URL::to('certification/phaseDetails/'.$info->id.'/'.$info->category)}}">Details</a></td>
                                       		</tr>
                                       	@endforeach
                                        </tbody>
                                       	
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
 </div> 
 <?php //echo $prgramList->links(); ?>

 <!--Entry form -->
 <!--Entry for Pin  A Certificate-->
 <div class="modal fade" id="newCertification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pin A Certificate</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'certification/saveCertificationInit','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				                   

				    {{Form::hidden('id','new')}}

                    <div class="form-group ">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div> 
                     
                    <div class="form-group required">
                                           
											{{Form::label('org_name', 'Organization Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('organization_all');
											
											?>
											<select required id="organizations" name='organization'  class="demo-default" placeholder="Select  Org...">
												
												@foreach($options as $organization)
												<option value="{{$organization}}">{{$organization}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>     
                         
                    <div class="form-group required">
                                        
											{{Form::label('category_id', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=[''=>'Select Category...','AOC'=>'AOC','AMO'=>'AMO','ATO'=>'ATO','Cargo'=>'Cargo','Passange-Domestic'=>'Passange-Domestic','Passange-International'=>'Passange-International'] ;?>

                                            {{Form::select('category',$options,'',array('class'=>'form-control','required'=>''))}}

											
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('date', 'Initialize Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('date',' ', array('class' => 'datepicker form-control','placeholder'=>''))}}
											</div>
											
                    </div> 
					<div class="form-group ">
                                           
											{{Form::label('renewal_date', 'Next Renewal Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('renewal_date',' ', array('class' => 'datepicker form-control','placeholder'=>''))}}
											</div>
											
                    </div> 
					<div class="form-group">
                       
                            <button type="submit" name='saveAndContinue' value='' class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					</div>
					{{Form::close()}}
            </div>
        </div>
    </div>


    @foreach($certificates as $info)
		 <div class="modal fade" id="cer_{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Certificate</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'certification/saveCertificationInit','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				     
				     {{Form::hidden('id',$info->id)}}

                    <div class="form-group ">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$info->title, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div> 
                     
                    <div class="form-group required">
                                           
											{{Form::label('org_name', 'Organization Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('organization_all');
											
											?>
											<select required id="organizations{{$info->id}}" name='organization'  class="demo-default" placeholder="Select  Org...">
												<option selected="" value="{{$info->organization}}">{{$info->organization}}</option>
												@foreach($options as $organization)
												<option value="{{$organization}}">{{$organization}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>     
                         
                    <div class="form-group required">
                                        
											{{Form::label('category_id', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=[''=>'Select Category...','AOC'=>'AOC','AMO'=>'AMO','ATO'=>'ATO','Cargo'=>'Cargo','Passange-Domestic'=>'Passange-Domestic','Passange-International'=>'Passange-International'] ;?>

                                            {{Form::select('category',$options,$info->category,array('class'=>'form-control','required'=>''))}}

											
											</div>
											
                    </div>
                        <div class="form-group ">
                                           
											{{Form::label('date', 'Initialize Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('date',$info->date, array('class' => 'datepicker form-control','placeholder'=>''))}}
											</div>
											
                    </div> 
                    <div class="form-group ">
                                           
											{{Form::label('renewal_date', 'Next Renewal Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('renewal_date',$info->renewal_date, array('class' => 'datepicker form-control','placeholder'=>''))}}
											</div>
											
                    </div> 
					<div class="form-group">
                       
                            <button type="submit" name='saveAndContinue' value='' class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					</div>
					{{Form::close()}}
            </div>
        </div>
    </div>
    <script>
	$(document).ready(function(){
	
	$("#organizations{{$info->id}}").selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	});
	</script>
	
    @endforeach
</div>

<script>
	$(document).ready(function(){
	
	$('#organizations').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	$('#organizationsedit').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	//multiple selection from options
var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
	var $select = $('#category').selectize({
					create          : true,
					onChange        : eventHandler('onChange'),
					onItemAdd       : eventHandler('onItemAdd'),
					onItemRemove    : eventHandler('onItemRemove'),
					onOptionAdd     : eventHandler('onOptionAdd'),
					onOptionRemove  : eventHandler('onOptionRemove'),
					onDropdownOpen  : eventHandler('onDropdownOpen'),
					onDropdownClose : eventHandler('onDropdownClose'),
					onFocus         : eventHandler('onFocus'),
					onBlur          : eventHandler('onBlur'),
					onInitialize    : eventHandler('onInitialize'),
				});	
	});
           
</script>
</section>
@stop
