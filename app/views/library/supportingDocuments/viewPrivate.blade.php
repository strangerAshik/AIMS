@extends('layoutTable')    
@section('content')

<section class='content widthController' style='margin: 0 auto; max-width: 1000px;'>

         <div class="row">
          <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title text-center text-primary"> Documents</h3>
                                </div><!-- /.box-header -->
                                 <div class="content">
            
                                </div>
                                <div class="box-body table-responsive">
                                                            
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                             <tr>
                                                <th>Type</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Published Year</th>
                                                 <th>Other Infos</th>        
                                                <th>Docs</th>
                                                @if('true'==CommonFunction::hasPermission('library_add_new_supporitng_docs',Auth::user()->emp_id(),'par_delete'))
                                                 	<th>P.D</th>
                                                 @endif
                                                 
												@if('true'==CommonFunction::hasPermission('library_add_new_supporitng_docs',Auth::user()->emp_id(),'sof_delete'))                
                                                	<th>S.D</th>
                                   				@endif         
                                    			@if('true'==CommonFunction::hasPermission('library_add_new_supporitng_docs',Auth::user()->emp_id(),'update'))            
                                                	<th>Update</th>
                                        		@endif  
                                                   
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                        @foreach ($allDocs as $info)
                                           <tr>
                                                <td>{{$info->doc_type}} </td>
                                                 <td>{{$info->doc_title}}</td>
                                                <td>{{nl2br($info->doc_authors)}}</td>
                                                <td>{{$info->doc_published_year}}</td>
                                                <td>
                                                @if($info->doc_isbn)
                                                ISBN: {{$info->doc_isbn}} <br/>
                                                @endif
                                                @if($info->doc_series)
                                                Series:  {{$info->doc_series}}<br/>
                                                @endif
                                                @if($info->doc_edition)
                                                Edition:  {{$info->doc_edition}}<br/>
                                                @endif
                                                @if($info->doc_part)
                                                Part : {{$info->doc_part}}<br/>
                                                @endif
                                                @if($info->doc_volume)
                                                Volume :  {{$info->doc_volume}}<br/>
                                                @endif
                                                @if($info->doc_amendment)
                                                Amendment:  {{$info->doc_amendment}}<br/>       
                                                @endif
                                                @if($info->doc_tags)
                                                Tags: {{nl2br($info->doc_tags)}}
                                                @endif
                                                    <br/>       
                                   				 </td>
                                                <td>
												@if($info->doc_url)
                                                Supporting Website(s): <a target="_blank" href="http://{{$info->doc_url}}" >Link</a></br>
                                                @endif
                                                Supported Doc:                              
                                                    @if($info->doc_upload!='Null'){{HTML::link('files/lib_supporting_docs/'.$info->doc_upload,'Document',array('target'=>'_blank'))}}
                                                    @else
                                                        {{HTML::link('#','No Document Provided')}}
                                                    @endif
                                                    </br></td>
									  @if('true'==CommonFunction::hasPermission('library_add_new_supporitng_docs',Auth::user()->emp_id(),'par_delete'))
										<td>
																		
											{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('lib_suporting_docs',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
										
										</td>
										 @endif
									@if('true'==CommonFunction::hasPermission('library_add_new_supporitng_docs',Auth::user()->emp_id(),'sof_delete'))
									<td>
									
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('lib_suporting_docs', $info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									
									</td>
									@endif
									@if('true'==CommonFunction::hasPermission('library_add_new_supporitng_docs',Auth::user()->emp_id(),'update'))
									
									<td>
										 <a data-toggle="modal" data-target="#updateSupportingDocs{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									
									</td>
									@endif
									
                                                
                                           </tr>
                                        @endforeach
                                        </tbody>
                                
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                      
        </div>

                       
		


<!--Edit Popup-->
   @foreach($allDocs as $info)	
	  <div class="modal fade" id="updateSupportingDocs{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Supporting Document</h4>
            </div>
		<div style='display:none'>	{{$num=$info->id}}</div>>
				
					
            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'library/updateSupportingDocument','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

					{{Form::hidden('id',$info->id)}}
					{{Form::hidden('old_doc_upload',$info->doc_upload)}}
				
					<div class="form-group required">
                                           
											{{Form::label('doc_title','Document Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('doc_title',$info->doc_title, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                        
											{{Form::label('doc_authors', 'Author(s)', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::textarea('doc_authors',$info->doc_authors, array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}

											
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('doc_type', 'Document Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('doc_type',$docTypesList,$info->doc_type,array('class'=>'form-control', 'required'=>''))}}
											
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('doc_subject', 'Subject', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('doc_subject',$info->doc_subject, array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                        
											{{Form::label('doc_tags', 'Tags', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('doc_tags',$info->doc_tags, array('class' => 'form-control','placeholder'=>'tags seferate with comma'))}}
											
											</div>
											
                    </div>
					
					<div class="form-group  ">
                                           
											{{Form::label('doc_series', 'Series', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														
														{{Form::text('doc_series',$info->doc_series, array('class' => 'form-control','placeholder'=>''))}}
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_edition', 'Edition', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
												{{Form::text('doc_edition',$info->doc_edition, array('class' => 'form-control','placeholder'=>''))}}
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_part', 'Part', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
												{{Form::text('doc_part',$info->doc_part, array('class' => 'form-control','placeholder'=>''))}}
											
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_volume', 'Volume', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														
														{{Form::text('doc_volume',$info->doc_volume, array('class' => 'form-control','placeholder'=>''))}}
											
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_amendment', 'Amendment', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
													{{Form::text('doc_amendment',$info->doc_amendment, array('class' => 'form-control','placeholder'=>''))}}
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_published_year', 'Published Year', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														{{Form::select('doc_published_year', $years,$info->doc_published_year,array('class'=>'form-control', ))}}
												</div>													
													
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('doc_isbn', 'ISBN ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('doc_isbn',$info->doc_isbn, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('doc_upload', 'Uploaded Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											@if($info->doc_upload!=''){{HTML::link('files/lib_supporting_docs/'.$info->doc_upload,'Document',array('target'=>'_blank'))}}
												@else
													{{HTML::link('#','No Document Provided')}}
												@endif
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('doc_upload', 'Update Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('doc_upload')}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('doc_url', 'URL ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('doc_url',$info->doc_url, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group required ">
                                           
											{{Form::label('doc_status', 'Keep ', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														{{Form::select('doc_status',array('Private'=>'Private','Public'=>'Public'),$info->doc_status,array('class'=>'form-control', 'required'=>''))}}
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

	<script>
$(document).ready(function(){

$('#doc_type{{$info->id}}').selectize();

//multiple selection from options
var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
var $select = $('#doc_tags{{$info->id}}').selectize({
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
var $select = $('#doc_authors{{$info->id}}').selectize({
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
//end multiple selection from options	
});
</script>
@endforeach
	  </section>
	

@stop