@extends('layout')
@section('content')
<section class='content widthController'>
  <!-- Chat box -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <i class="fa fa-comments-o"></i>
                                    <h3 class="box-title">Follow Up</h3>                                  
                                   
                                </div>
                                @include('common')
                                    @yield('print')
                                <div class="box-body chat" >
                                    <!-- chat item -->
									@foreach($folloUpInfos as $followUp)
                                    <div class="item">
                                    <div class="disNon">{{$image=CommonFunction::userPhotoById($followUp->user_id)}}</div>
                                      {{HTML::Image('files/userPhoto/'.$image,'User image',array('class'=>'online'))}}                       
                                    
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>
												{{$newDateTime = date('h:i A', strtotime($followUp->created_at));}}
													{{$date=date('d M y')}}</small>
                                                {{$followUp->user_name}}
                                            </a>
											{{$followUp->follow_up}}
                                        </p>
										@if($followUp->follow_up_file!='Null')
                                        <div class="attachment">
                                            <h4>Attachments:</h4>
                                            <p class="filename">
													{{$followUp->follow_up_file}}
                                            </p>
                                            <div class="pull-right">
                                               	{{HTML::link('files/sia_follow_up_file/'.$followUp->follow_up_file,'Open',array('target'=>'_blank','class'=>'btn btn-primary btn-sm btn-flat'))}}
                                            </div>
                                        </div><!-- /.attachment -->
										@endif
                                    </div><!-- /.item -->
									@endforeach


             
                                <div class="box-footer">
								{{Form::open(array('url' => 'surveillance/saveFollowUp', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
									{{ Form::hidden('sia_number',$sia_number) }}
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