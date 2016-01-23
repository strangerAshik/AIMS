@extends('layoutCalendar')
@section('content')
                <!-- Main content -->
                <section class="content">


                    <div class="row">
                        <div class="col-md-3">
                           
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Create Event</h3>
                                </div>
                                <div class="box-body">
                                <p class="text-center">
                                <button class="btn btn-primary btn-block " data-toggle="modal" data-target="#addEvent">Add Event</button>
                                </p>
                                   
                                </div>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-9">
                            <div class="box box-primary">
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->


                </section><!-- /.content -->

<!--Add Event -->
<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Event</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
                    {{Form::open(array('url' => '#', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}

                   
                <div class="form-group ">
                                    
                                        {{Form::label('hazard_identification', 'Title', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            {{Form::text('hazard_identification',' ', array('class' => 'form-control','placeholder'=>''))}}
                                        </div>
                                        
                </div>  
                <div class="form-group ">
                                    
                                        {{Form::label('hazard_identification', 'Organization(s)', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            {{Form::text('hazard_identification',' ', array('class' => 'form-control','placeholder'=>''))}}
                                        </div>
                                        
                </div>  
                <div class="form-group ">
                                    
                                        {{Form::label('hazard_identification', 'Venue', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            {{Form::text('hazard_identification',' ', array('class' => 'form-control','placeholder'=>''))}}
                                        </div>
                                        
                </div>
                <div class="form-group ">
                                    
                                        {{Form::label('hazard_identification', 'Media', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            {{Form::text('hazard_identification',' ', array('class' => 'form-control','placeholder'=>''))}}
                                        </div>
                                        
                </div>
                <div class="form-group ">
                                    
                                        {{Form::label('hazard_identification', 'Date', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            {{Form::text('hazard_identification',' ', array('class' => 'form-control','placeholder'=>''))}}
                                        </div>
                                        
                </div>
                <div class="form-group ">
                                    
                                        {{Form::label('hazard_identification', 'Time', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            {{Form::text('hazard_identification',' ', array('class' => 'form-control','placeholder'=>''))}}
                                        </div>
                                        
                </div>
                <div class="form-group ">
                                    
                                        {{Form::label('hazard_identification', 'Purpose(s)', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            {{Form::textarea('hazard_identification',' ', array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
                                        </div>
                                        
                </div>
                <div class="form-group ">
                                    
                                        {{Form::label('hazard_identification', 'Attendees', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            {{Form::textarea('hazard_identification',' ', array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
                                        </div>
                                        
                </div>
                <div class="form-group ">
                                    
                                        {{Form::label('hazard_identification', 'Status', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                           
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
    </div>
    

<!--Event Display Form-->
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary"><a id="" >Event Page</a></button>
            </div>
        </div>
    </div>
</div>
@stop
         