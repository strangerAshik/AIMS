@extends('layoutTable')
@section('content')
<section class="content contentWidth">
<p class="text-center col-md-12">
                <button class="btn btn-primary  btn-block"   data-toggle="modal" data-target="#newCertification">&nbsp Add Timeline</button>
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
                                                <th>Order</th>
                                                <th>Event</th>
                                                <th>Regulation/Guidance/Reference/Template
</th>
                                                <th>Duration</th>
                                                <th>Weight</th>
                                               
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                       		<tr>
                                       			<td>1</td>
                                       			<td>1</td>
                                                <td>Issuance of AOC Application</td>
                                       			<td><a href="#">Document</a></td>
                                                <td>2 day</td>
                                       			<td>1</td>                                       			
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
                <h4 class="modal-title">Add Timeline</h4>
            </div>

            <div class="modal-body"> 
                              
                {{Form::open(array('url'=>'surveillance/saveProgram','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
                  
                    
                    <div class="form-group required">
                                           
                                            {{Form::label('order', 'Order', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('order',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                    
                    <div class="form-group required">
                                           
                                            {{Form::label('event', 'Event', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('event',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                    
                    <div class="form-group required">
                                           
                                            {{Form::label('duration', 'Duration', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::number('duration',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>      
                    
                     <div class="form-group required">
                                           
                                            {{Form::label('weight', 'Weight', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('weight',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                     <div class="form-group ">
                                           
                                            {{Form::label('docs', 'Regulation/Guidance/Reference/Template', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::file('docs')}}
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