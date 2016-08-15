@extends('layoutTable')
@section('content')
<section class="content contentWidth">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">          
            <div class="box-body">
            <?php $phaseInfo=CommonFunction::phaseInfo($phaseId);?>
               <span>{{$phaseInfo->title}}: {{$phaseInfo->subtitle}}</span> 
            </div>
        </div>
    </div>    
</div>
<p class="text-center col-md-12">
                <button class="btn btn-primary  btn-block"   data-toggle="modal" data-target="#newCertification">&nbspAdd Timeline and Sample Template</button>
</p>


<!--  -->
 	<div class="row">
                        <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Events</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order</th>
                                                <th>Event</th>
                                                <th>Regulation/Guidance/Reference/Template</th>
                                                <th>Duration</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                               
                                               
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                         @foreach($timelines as $info)
                                       		<tr>
                                       			<td>{{++$num}}</td>
                                       			<td>{{$info->order}}</td>
                                                <td>{{$info->event}}</td>
                                       			<td>
                                                    <?php $docs=CommonFunction::getDocs($info->id,'timeline','docs');?>
                                                    @foreach($docs as $doc)
                                                    <a href="{{URL::to('files/documents/'.$doc->calling_id)}}">{{$doc->doc_name}}</a>{{ HTML::linkAction('BaseController@permanentDelete', '',array('documents',$doc->id,"#"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;text-align:center','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}<br>
                                                    @endforeach
                                                </td>
                                                <td>{{$info->duration}} day(s)</td>
                                                <td><a href="#"  data-toggle="modal" data-target="#edit{{$info->id}}">Edit</a></td>                    
                                                <td>{{ HTML::linkAction('BaseController@permanentDelete', '',array('timeline',$info->id,"#"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;text-align:center','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}     </td>
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
                <h4 class="modal-title">Add Timeline</h4>
            </div>

            <div class="modal-body"> 
                              
                {{Form::open(array('url'=>'certification/saveTimeline','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

                    {{Form::hidden('id','new')}}
                    {{Form::hidden('phase_id', $phaseId)}}
                  
                    
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
                    
                     <div class="form-group ">
                                           
                                            {{Form::label('docs', 'Regulation/Guidance/Reference/Template', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::file('docs[]',['multiple' => 'multiple'])}}
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

 @foreach($timelines as $info)

 <div class="modal fade" id="edit{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Timeline</h4>
            </div>

            <div class="modal-body"> 
                              
                {{Form::open(array('url'=>'certification/saveTimeline','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

                    {{Form::hidden('id', $info->id)}}
                  
                    
                    <div class="form-group required">
                                           
                                            {{Form::label('order', 'Order', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('order',$info->order, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                    
                    <div class="form-group required">
                                           
                                            {{Form::label('event', 'Event', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('event',$info->event, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                    
                    <div class="form-group required">
                                           
                                            {{Form::label('duration', 'Duration', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::number('duration',$info->duration, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>      
                    
                     <div class="form-group ">
                                           
                                            {{Form::label('docs', 'Add New Regulation/Guidance/Reference/Template', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::file('docs[]',['multiple' => 'multiple'])}}
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