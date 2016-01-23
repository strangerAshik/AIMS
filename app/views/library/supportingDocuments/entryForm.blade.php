
@section('newSupportingDocs')
<div class="modal fade" id="supportingDocs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Supporting Document</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'library/saveSupportingDocument','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

				
					<div class="form-group required">
                                           
											{{Form::label('doc_title','Document Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('doc_title','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('doc_authors', 'Author(s)', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::textarea('doc_authors','', array('class' => 'form-control','placeholder'=>'','required'=>'','size'=>'4x2'))}}

											
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('doc_type', 'Document Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('doc_type',$docTypesList,'0',array('class'=>'form-control', 'required'=>''))}}
											
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('doc_subject', 'Subject', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('doc_subject',' ', array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                        
											{{Form::label('doc_tags', 'Tags', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('doc_tags',' ', array('class' => 'form-control','placeholder'=>'tags seferate with comma'))}}
											
											</div>
											
                    </div>
					
					<div class="form-group  ">
                                           
											{{Form::label('doc_series', 'Series', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														{{Form::select('doc_series',array(''=>'--Select Series --','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),'0',array('class'=>'form-control'))}}
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_edition', 'Edition', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														{{Form::select('doc_edition',array(''=>'--Select Series --','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),'0',array('class'=>'form-control'))}}
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_part', 'Part', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														{{Form::select('doc_part',array(''=>'--Select Part --','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),'0',array('class'=>'form-control'))}}
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_volume', 'Volume', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														{{Form::select('doc_volume',array(''=>'--Select Volume --','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),'0',array('class'=>'form-control'))}}
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_amendment', 'Amendment', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														{{Form::select('doc_amendment',array(''=>'--Select Amendment --','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),'0',array('class'=>'form-control'))}}
												</div>													
													
											
                    </div>
					<div class="form-group  ">
                                           
											{{Form::label('doc_published_year', 'Published Year', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														{{Form::select('doc_published_year', $years,'0',array('class'=>'form-control'))}}
												</div>													
													
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('doc_isbn', 'ISBN ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('doc_isbn','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('doc_upload', 'Upload Document ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('doc_upload')}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('doc_url', 'URL ', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('doc_url','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group required ">
                                           
											{{Form::label('doc_status', 'Keep ', array('class' => 'col-xs-4 control-label'))}}
											
												<div class="col-xs-6">
														{{Form::select('doc_status',array('Private'=>'Private','Public'=>'Public'),'0',array('class'=>'form-control', 'required'=>''))}}
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

//$('#doc_typez').selectize();

//multiple selection from options

//end multiple selection from options	
});
</script>
<div class="modal fade" id="supportingDocsType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Supporting Document Type</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'library/saveSupportingDocumentType','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

				
					<div class="form-group required">
                                           
											{{Form::label('doc_type',' Document Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-7">
											{{Form::text('doc_type','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					

					<div class="form-group">
                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Add New Document Type</button>
                       
                    </div>
					
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop
