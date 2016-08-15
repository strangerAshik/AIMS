@extends('layoutTable')
@section('content')
<section class="content contentWidth">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">          
            <div class="box-body">
            <?php $phaseInfo=CommonFunction::phaseInfo($phaseId);?>

            <?php $formInfo=CommonFunction::formInfo($phaseId,$formId);?>
            @if($phaseInfo)
               <span>{{$phaseInfo->title}}: {{$phaseInfo->subtitle}}</span> 
            @endif
            @if($formInfo)
               <span> | {{$formInfo->form_name}}</span> 
            @endif
            </div>
        </div>
    </div>    
</div>
<p class="text-center col-md-12">
				<button class="btn btn-primary  btn-block"   data-toggle="modal" data-target="#newCertification">&nbsp Add Form Field</button>
</p>


<!--  -->
 	<div class="row">
                        <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Documents</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order</th>
                                                <th>Name</th>                                               
                                                <th>Prompt to Remember</th>                                               
                                                <th>Field Type</th>                                               
                                                <th>Required</th>                                               
                                                <th>Edit</th>                                               
                                                <th>Delete</th>                                               
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                         @foreach($fields as $info)
                                            <tr>
                                                <td>{{++$num}}</td>

                                                <td>{{$info->order}}</td>                       
                                                <td>{{$info->field_name}}</td>
                                                <td>{{$info->placeholder}}</td>
                                                <td>{{$info->type}}</td>
                                                <td>{{$info->required}}</td>
                                                <td>
                                                <a href="#"  data-toggle="modal" data-target="#edit{{$info->id}}">Edit</a>

                                                   </td>
                                                <td>
                                                    {{ HTML::linkAction('BaseController@permanentDelete', '',array('form_fields',$info->id,"#"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;text-align:center','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}     
                                                </td>
                                                <td>
                                                @if($info->type=='dropdown')
                                                <a href="{{URL::to('certification/documentFieldOption/'.$phaseId.'/'.$formId.'/'.$info->id)}}">Add Option</a>
                                                @else 
                                                 Nil
                                                @endif

                                                </td>                                     
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
                <h4 class="modal-title">Add Field</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'certification/saveFormField','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
                    {{Form::hidden('id','new')}}
                    {{Form::hidden('phase_id',$phaseId)}}
                    {{Form::hidden('form_id',$formId)}}
                    <div class="form-group required">
                                           
                                            {{Form::label('order', 'Order', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('order',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                    <div class="form-group required">
                                           
                                            {{Form::label('field_name', 'Field Name', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('field_name',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                    <div class="form-group ">
                                           
                                            {{Form::label('placeholder', 'Prompt to Remember', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('placeholder',' ', array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                            
                    </div> 
                     <div class="form-group required">
                                        
                                            {{Form::label('type', 'Type', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                        <?php $options=[
                                        ''=>'Select Field Type......',
                                        'text'=>'Text',
                                        'textarea'=>'Textarea',
                                        'file'=>'File',
                                        'multiFile'=>'Multi File',
                                        'dropdown'=>'Dropdown',
                                        'date'=>'Date'
                                        ] ;?>
                                           {{Form::select('type', $options,'',array('class'=>'form-control','required'=>''))}}
                                            </div>
                                            
                    </div>
                     <div class="form-group required">
                                        
                                            {{Form::label('required', 'Required', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                        <?php $options=[
                                        'no'=>'No',
                                        'yes'=>'Yes',
                                        ] ;?>
                                           {{Form::select('required', $options,'',array('class'=>'form-control','required'=>''))}}
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
@foreach($fields as $info)
 <div class="modal fade" id="edit{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Field</h4>
            </div>

            <div class="modal-body"> 
                              
                {{Form::open(array('url'=>'certification/saveFormField','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
                    {{Form::hidden('id',$info->id)}}
                  
                    {{Form::hidden('phase_id',$phaseId)}}
                    {{Form::hidden('form_id',$formId)}}
                    <div class="form-group required">
                                           
                                            {{Form::label('order', 'Order', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('order',$info->order, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                    <div class="form-group required">
                                           
                                            {{Form::label('field_name', 'Field Name', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('field_name',$info->field_name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div> 
                    <div class="form-group ">
                                           
                                            {{Form::label('placeholder', 'Prompt to Remember', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('placeholder',$info->placeholder, array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                            
                    </div> 
                     <div class="form-group required">
                                        
                                            {{Form::label('type', 'Type', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                        <?php $options=[
                                        ''=>'Select Field Type......',
                                        'text'=>'Text',
                                        'textarea'=>'Textarea',
                                        'file'=>'File',
                                        'multiFile'=>'Multi File',
                                        'dropdown'=>'Dropdown',
                                        'date'=>'Date'
                                        ] ;?>
                                           {{Form::select('type', $options,$info->type,array('class'=>'form-control','required'=>''))}}
                                            </div>
                                            
                    </div>
                     <div class="form-group required">
                                        
                                            {{Form::label('required', 'Required', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                        <?php $options=[
                                        'no'=>'No',
                                        'yes'=>'Yes',
                                        ] ;?>
                                           {{Form::select('required', $options,$info->required,array('class'=>'form-control','required'=>''))}}
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