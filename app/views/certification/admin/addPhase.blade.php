@extends('layoutTable')
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
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Category</th>
                                                <th>Total Day(s)</th>
                                                <th>order</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                         @foreach($allPhases as $info)
                                       		<tr>
                                       			<td>{{++$num}}</td>
                                                <td>{{$info->title}}</td>
                                       			<td>{{$info->subtitle}}</td>
                                       			<td>{{$info->category_id}}</td>
                                                <td>{{$info->total_day}}</td>
                                                <td>{{$info->order}}</td>
                                                <td><a href="#"  data-toggle="modal" data-target="#edit{{$info->id}}">Edit</a></td>
                                       			<td>
                                                     {{ HTML::linkAction('BaseController@permanentDelete', '',array('phase',$info->id,"#"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;text-align:center','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}     
                                                </td>
                                       			
                                       			<td><a href="{{URL::to('certification/phase/'.$info->id)}}">Details</a></td>
                                       		</tr>
                                        @endforeach
                                       		
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
                              
				{{Form::open(array('url'=>'certification/savePhase','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
                    {{Form::hidden('id','new')}}
                    <div class="form-group required">
                                           
                                            {{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('title',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
					
                    <div class="form-group required">
                                           
											{{Form::label('subtitle', 'Subtitle', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('subtitle',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>      
                    <div class="form-group required">
                                        
											{{Form::label('category_id', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
                                            <?php $options=CommonFunction::getOptions('certificate_category');?>
											
                                            {{Form::select('category_id',[''=>'Select Category...']+$options,'',array('class'=>'form-control','required'=>''))}}

											
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
                                            {{Form::label('total_day', 'Total Day(s)', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('total_day',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                     <div class="form-group required">
                                           
											{{Form::label('order', 'Order', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('order',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
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

 @foreach($allPhases as $info)
     <div class="modal fade" id="edit{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Phase</h4>
            </div>

            <div class="modal-body"> 
                              
                {{Form::open(array('url'=>'certification/savePhase','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
                  
                    {{Form::hidden('id',$info->id)}}
                    <div class="form-group required">
                                           
                                            {{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('title',$info->title, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                    
                    <div class="form-group required">
                                           
                                            {{Form::label('subtitle', 'Subtitle', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('subtitle',$info->subtitle, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>      
                    <div class="form-group required">
                                        
                                            {{Form::label('category_id', 'Category', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            <?php $options=[''=>'Select Category...','AOC'=>'AOC','AMO'=>'AMO','ATO'=>'ATO','Cargo'=>'Cargo','Passange-Domestic'=>'Passange-Domestic','Passange-International'=>'Passange-International'] ;?>

                                            {{Form::select('category_id',$options,$info->category_id,array('class'=>'form-control','required'=>''))}}

                                            
                                            </div>
                                            
                    </div>
                     <div class="form-group required">
                                           
                                            {{Form::label('total_day', 'Total Day(s)', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('total_day',$info->total_day, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                     <div class="form-group required">
                                           
                                            {{Form::label('order', 'Order', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('order',$info->order, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
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
 @endforeach


</section>


@stop