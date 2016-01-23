
@if($PageName=='Single Question')
@section('updateQuestion')
@foreach($question as $info)
<div class="modal fade" id="updateQuestion{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Question</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'helpFaq/updateQuestion','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				  
					{{Form::hidden('id',$info->id)}}
					{{Form::hidden('old_file',$info->file)}}
                     
                    <div class="form-group required">
                                           
											{{Form::label('category', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											<select required id="categories"  multiple name="categories[]" class="demo-default" placeholder="Select  Category...">
												@if($cat=CommonFunction::updateMultiSelection('help_faq_question', 'id',$info->id,'category'))
												@foreach($cat as $key=>$value)
									<option selected='selected' value="{{$value}}">{{$value}}</option>
												@endforeach
												@endif
												<?php $options=CommonFunction::getOptions('helpFaq_categories');?>
												@foreach($options as $option)
												<option  value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('question', 'Ask Question', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('question',$info->question, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('file', 'Upload File', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											@if($info->file!='Null'){{HTML::link('files/helpFaq/'.$info->file,'Document',array('target'=>'_blank'))}}
		                                    @else
		                                        {{HTML::link('#','No Certificate Provided')}}
		                                    @endif</br>
											{{Form::file('file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>

					
					<div class="form-group">
                       
                            <button type="submit" name='saveAndContinue' value='' class="btn btn-primary btn-lg btn-block">Submit Question</button>
                       
                    </div>
					</div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function(){
	
	//$('#categorie').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	//multiple selection from options
var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
	var $select = $('#categories').selectize({
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
@endforeach
@stop
@endif

@if($PageName=='Single Question')
@section('updateAns')
@foreach($ans as $info)
<div class="modal fade" id="updateAns{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Answare</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'helpFaq/updateAnswre','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
				
				  {{Form::hidden('id',$info->id)}}
				  {{Form::hidden('old_file',$info->file)}}
					
					<div class="form-group ">
                                           
											{{Form::label('answare', 'Answer', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('ans',$info->ans, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('file', 'Upload File', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											@if($info->file!='Null'){{HTML::link('files/helpFaq/'.$info->file,'Document',array('target'=>'_blank'))}}
		                                    @else
		                                        {{HTML::link('#','No Certificate Provided')}}
		                                    @endif</br>
											{{Form::file('file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>

					
					<div class="form-group">
                       
                            <button type="submit"   class="btn btn-primary btn-lg btn-block">Submit Answare</button>
                       
                    </div>
					</div>
					{{Form::close()}}
            </div>
        </div>
    </div>

<script>
	$(document).ready(function(){
	
	//$('#categorie').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	//multiple selection from options
var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
	var $select = $('#').selectize({
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
@endforeach
@stop
@endif
