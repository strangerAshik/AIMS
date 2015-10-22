 
@section('updateTypes')

	@foreach($docTypes as $docType)
	<div class="modal fade" id="updateSupportingDocsType{{$docType->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Supporting Document Type</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'library/updateSupportingDocumentType','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}

					{{Form::hidden('id',$docType->id)}}
					{{Form::hidden('old_doc_type',$docType->doc_type)}}
					<div class="form-group required">
                                           
											{{Form::label('doc_type',' Document Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-7">
											{{Form::text('doc_type',$docType->doc_type, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
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
	@endforeach
@stop