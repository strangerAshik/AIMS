@extends('layoutTable')
@section('content')

<section class='content widthController'>
<div class='row col-md-12 hidden-print'>
        
                <p class="text-center col-md-12">
                <button class="btn btn-primary btn-block " data-toggle="modal" data-target="#orgDropdownEntry">Add Drop-down Name</button>
                </p>
</div>
<!--Dropdown Add -->
<div class="modal fade" id="orgDropdownEntry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Drop-down Name</h4>
                </div>

                <div class="modal-body">
                                  
                   {{Form::open(array('url'=>'saveDropDownOption','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}

                    <div class="form-group ">
                        <label class="col-xs-4 control-label" for="">Dropdown Name</label>
                        <div class="col-xs-6 ">
                        {{Form::text("dropdown_names",'',array('class'=>'form-control'))}}</br>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-xs-4 control-label" for="">Core Module  Name</label>
                        <div class="col-xs-6 ">
                        {{Form::text("core_module_names",'',array('class'=>'form-control'))}}</br>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-xs-4 control-label" for=""><button class="add_field_button btn btn-primary">Add More Option</button></label>
                        <div class="col-xs-6 input_fields_wrap">
                        {{Form::text("mytext[]",'',array('class'=>'form-control'))}}</br>
                        </div>
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
                $(wrapper).append('<div>{{Form::text("mytext[]",'',array('class'=>'form-control'))}}<a href="#" class="remove_field btn btn-warning">Remove</a></div>'); //add input box
        }
    });
   
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

</script>
<!-- End Dropdown Add -->

 <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">                            
                                <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Drop-down List</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>                                       
                                            <tr>
                                                <th>Core Module Names</th>
                                                <th>Dropdown Names</th>                                               
                                                <th>View Details</th>                                               
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                       @foreach($dropdownList as $info)
                                            <tr>
                                                <td class='text-centre'>{{$info->core_module_names}}</td> 
                                                <td class='text-centre'>{{$info->dropdown_names}}</td>
                                                <td class='text-centre'>
                                                    <a class="small-box-footer" target="_blink" href="singleDropdown/{{$info->dropdown_names}}/{{$info->core_module_names}}" >                                   View Details 
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
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
@stop