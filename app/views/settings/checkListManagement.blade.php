@extends('layout')
@section('content')
<section class='content widthController'>
<div class='row col-md-12 hidden-print'>
        
                <p class="text-center col-md-12">
                <button class="btn btn-primary btn-block " data-toggle="modal" data-target="#addQuestion">Add Question</button>
                </p>
</div>
<div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Question</h4>
                </div>

                <div class="modal-body">
                                  
                   {{Form::open(array('url'=>'saveChecklistQuestion','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}

                    <div class="form-group ">
                        <label class="col-xs-4 control-label" for="">Checklist Name</label>
                        <div class="col-xs-6 ">
                        <?php $clName=CommonFunction::getChecklistName();?>
											<select required id="checklist_name" name='checklist_name'class="demo-default" >
												<option value="">Select Or Add Checklist Name</option>
												@foreach($clName as $info)
												<option value="{{$info}}">{{$info}}</option>
												@endforeach 
											</select>
                      
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-xs-4 control-label" for="">Checklist Type</label>
                        <div class="col-xs-6 ">
                        <?php $clType=CommonFunction::getChecklistType();?>
											<select required id="checklist_type" name='checklist_type'class="demo-default" >
												<option value="">Select Or Add Checklist Type</option>
												@foreach($clType as $info)
												<option value="{{$info}}">{{$info}}</option>
												@endforeach 
											</select>
                       
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-xs-4 control-label" for="">Section</label>
                        <div class="col-xs-6 ">
                        <?php $section=CommonFunction::getSections();?>
											<select required id="section" name='section'class="demo-default" >
												<option value="">Select Or Add Section</option>
												@foreach($section as $info)
												<option value="{{$info}}">{{$info}}</option>
												@endforeach 
											</select>
                       
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label class="col-xs-4 control-label" for="">Question</label>
                        <div class="col-xs-6 input_fields_wrap">
                       {{Form::text("questions[]",'',array('class'=>'form-control'))}}<br/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-xs-4 control-label" for=""><button class="add_field_button btn btn-primary">Add More Question(s)</button></label>
                        
                    </div>
                    <div class="form-group">
                                           
                                                <button type="submit" class="btn btn-primary btn-block btn-lg">Save</button>
                                           
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
                $(wrapper).append('<div>{{Form::text("questions[]",'',array('class'=>'form-control'))}}<a href="#" class="remove_field btn btn-warning">Remove</a></div>'); //add input box
        }
    });
   
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
   


    });

</script>
<script>
	$(document).ready(function(){

$('#checklist_name').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#checklist_type').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
//$('#aircraft_msn').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#section').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#question_id').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#final_regulation_method').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#sc_sia_number').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});


	
});
	</script>
<!-- End Dropdown Add -->
<div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">                            
                                <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Checklist</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>                                       
                                            <tr>
                                                <th>Checklist Name</th>
                                                <th>Checklist Type</th>                                               
                                                <th>View Details</th>                                               
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        
                                        @if($checklists!=null)
                                       @foreach($checklists as $info)
                                            <tr>
                                                <td class='text-centre'>{{$info->checklist_name}}</td> 
                                                <td class='text-centre'>{{$info->checklist_type}}</td>
                                                <td class='text-centre'>
                                                    <a class="small-box-footer" target="_blink" href="singleChecklist/{{$info->checklist_name}}/{{$info->checklist_type}}" >                                   View Details 
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                        
                                    </table>
                                    
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div>  



</section>
@stop