@extends('layout')
@section('content')
<section class='content widthController' >
         
      <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">{{$core_module_names}} : {{$dropdown_names}}</h3>
									

									<div class="col-md-4 col-md-offset-3  position">
										<form action="" class="search-form">
											<div class="form-group has-feedback">
												<label for="search" class="sr-only">Search</label>
												<input type="text" class="form-control" name="search" id="search" placeholder="search">
												<span class="glyphicon glyphicon-search form-control-feedback"></span>
											</div>
										</form>
									</div>

                                </div><!-- /.box-header -->
							
                                <div class="box-body">
								
                                    <table class="table table-bordered">
										<thead>
										<tr><td>	<!--Add New Options-->
									<div data-toggle="modal" data-target="#orgDropdownEntry" href='' class='btn btn-primary'>
                                      			    Add New Option(s)
                                  	</div>
                                  	<!--End New Options--></td></tr>
											<tr>
												<th>id</th>
												<th>Options</th>
												<th>Update</th>
												<th>Soft Delete</th>
												<th>Permanent Delete</th>
											</tr>
										</thead>
										
										<tbody>
										@foreach($getOptions as $info)
											<tr>
												<td class='text-centre'>{{$info->id}}</td>
												<td class='text-centre'>{{$info->options}}</td>
																							
												<td class='text-centre'>
													<a data-toggle="modal" data-target="#updateOption{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                      			    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                  				   </a>
												</td>
												
												<td class='text-centre'>
													{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('dropdown_option_management',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
												</td>	
												<td class='text-centre'>
													{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('dropdown_option_management',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
												</td>
											</tr>
										@endforeach
										</tbody>
										
									</table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div>  
			
         
</section>
@include('settings.editForm')
@yield('updateOption')
<!--Dropdown Add -->

<div class="modal fade" id="orgDropdownEntry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">Add New Option(s)</h4>
	            </div>

	            <div class="modal-body">
	                              
					{{Form::open(array('url'=>'saveDropDownOption','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
					{{Form::hidden('core_module_names',$core_module_names)}}
					{{Form::hidden('dropdown_names',$dropdown_names)}}
					
					<div class="form-group ">
						<label class="col-xs-4 control-label" for=""><button class="add_field_button btn btn-primary">Add More Option</button></label>
						<div class="col-xs-6 input_fields_wrap">
						{{Form::text("mytext[]",'',array('class'=>'form-control'))}}</br>
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
<script type="text/javascript">
		$(document).ready(function() {
	    var max_fields      = 50; //maximum input boxes allowed
	    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	    var add_button      = $(".add_field_button"); //Add button ID
	   
	    var x = 1; //initlal text box count
	    $(add_button).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $(wrapper).append('<div>{{Form::text("mytext[]",'',array('class'=>'form-control'))}}<a href="#" class="remove_field btn btn-warning">Remove</a></div>'); //add input box
        }
    });
   
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); x--;
	    })
	});

</script>
<!-- End Dropdown Add -->
@stop