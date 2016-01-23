@extends('layout')
@section('content')
<section class='content widthController'>
  <!-- Chat box -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <i class="fa fa-comments-o"></i>
                                    <h3 class="box-title">Follow Up</h3>                                  
                                   
                                </div>
                                
                                <div class="box-footer">
								{{Form::open(array('url' => 'surveillance/saveFollowUp', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
									{{ Form::hidden('certificate_no','$sia_number') }}
                                    <div class="input-group">
                                        <input required name='follow_up'class="form-control" placeholder="Type message..."/>                                         
                                         {{ Form::file('follow_up_file') }}
                                        <div class="input-group-btn">
                                            <button type='submit' class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
								{{Form::close()}}
                                </div>
                            </div><!-- /.box (chat box) -->

                     
                          
                        </section><!-- /.Left col -->
@stop