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
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Certificate No</th>
                                                <th>Organization</th>
                                                <th>Initialize Date</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Certified</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                       		<tr>
                                       			<td>CER_5823578</td>
                                       			<td>ASRTM</td>
                                       			<td>01-01-2016</td>
                                       			<td>Certification For AMO</td>
                                       			<td>AMO</td>
                                       			<td>Yes</td>
                                       			<td><a href="{{URL::to('certification/singleCertification/CER_5823578')}}">Details</a></td>
                                       		</tr>
                                       		<tr>
                                       			<td>CER_6094838</td>
                                       			<td>ASRTM</td>
                                       			<td>01-01-2015</td>
                                       			<td>Certification For ATO</td>
                                       			<td>AMO</td>
                                       			<td>No</td>
                                       			<td><a href="#">Details</a></td>
                                       		</tr>
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
                              
				{{Form::open(array('url'=>'surveillance/saveProgram','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
					{{Form::hidden('certificate_no','CER'.'_'.time())}}
					
					<div class="form-group required">
                                           
											{{Form::label('certificate_no', 'Certificate Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('certificate_no','CER'.'_'.time(), array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>''))}}
											</div>
											
                    </div>                    
                     
                    <div class="form-group required">
                                           
											{{Form::label('org_name', 'Organization Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('organization_all');
											$myOrg=Auth::user()->Organization();
											?>
											<select required id="organizations" name=''  disabled="" class="demo-default" placeholder="Select  Org...">
												<option value="{{$myOrg}}">{{$myOrg}}</option>
												@foreach($options as $organization)
												<option value="{{$organization}}">{{$organization}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>     
                    {{Form::hidden('organization','CER'.'_'.time())}}
                    <div class="form-group ">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>      
                    <div class="form-group required">
                                        
											{{Form::label('category', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=['AMO','ATO','Cargo','Passange-Domestic','Passange-International'] ;?>
											<select   id="category"  multiple name="category[]" class="demo-default" required>
												<option value="">Select Category...</option>
												@foreach($options as $option)
												<option  value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
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
</div>

<script>
	$(document).ready(function(){
	
	$('#organizations').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
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
