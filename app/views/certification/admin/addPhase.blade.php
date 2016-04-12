@extends('layout')
@section('content')
<section class="content contentWidth">
<p class="text-center col-md-12">
				<button class="btn btn-primary  btn-block"   data-toggle="modal" data-target="#newCertification">&nbsp Add Phase</button>
</p>


<!--  -->
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
                                                <th>#</th>
                                                <th>Phase Name</th>
                                                <th>Category</th>
                                                <th>Total Day(s)</th>
                                                <th>Weight</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                       		<tr>
                                       			<td>1</td>
                                       			<td>Phase-1</td>
                                       			<td>AMO6</td>
                                                <td>60</td>
                                       			<td>20</td>
                                       			
                                       			<td><a href="{{URL::to('certification/phase/1')}}">Details</a></td>
                                       		</tr>
                                       		
                                        </tbody>
                                       	
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
 </div> 

 <!--Entry form -->
 <!--Entry for Pin  A Certificate-->
 <div class="modal fade" id="newCertification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Phase</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'surveillance/saveProgram','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
					
                    <div class="form-group required">
                                           
											{{Form::label('name', 'Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('name',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>      
                    <div class="form-group required">
                                        
											{{Form::label('category', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=['AMO','ATO','Cargo','Passange-Domestic','Passange-International'] ;?>
											<select   id="category"   name="category" class="form-control" required>
												<option value="">Select Category...</option>
												@foreach($options as $option)
												<option  value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
                                            {{Form::label('totalDay', 'Total Day(s)', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('totalDay',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                     <div class="form-group required">
                                           
											{{Form::label('weight', 'Weight', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('weight',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
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


</section>


@stop