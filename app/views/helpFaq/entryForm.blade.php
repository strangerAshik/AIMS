@if($PageName=='Ask Question')
@section('askQuestion')
<div class="modal fade" id="newProgram" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Question</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'helpFaq/store','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
					
                     
                    <div class="form-group required">
                                           
											{{Form::label('category', 'Category', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<?php $options=CommonFunction::getOptions('helpFaq_categories');?>
											<select required id="categories"  multiple name="categories[]" class="demo-default" placeholder="Select  Category...">
												<option value="">Select  Org...</option>
												@foreach($options as $option)
												<option value="{{$option}}">{{$option}}</option>
												@endforeach
											</select>
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('question', 'Ask Question', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('question','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('upload', 'Upload File', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('upload')}}
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

@stop
@endif


@if($PageName=='Single Question')
@section('answare')
<div class="modal fade" id="answare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Answare</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'answare/store','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
					
					<div class="form-group ">
                                           
											{{Form::label('answare', 'Answare', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('answare','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('upload', 'Upload File', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('upload')}}
											</div>
											
                    </div>

					
					<div class="form-group">
                       
                            <button type="submit" name='saveAndContinue' value='' class="btn btn-primary btn-lg btn-block">Submit Answare</button>
                       
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

@stop
@endif
