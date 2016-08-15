@extends('layout')    
@section('content')
<div style="display:none">
{{$role=Auth::User()->Role()}}
</div>
<section class='content widthController' style='margin: 0 auto; max-width: 1000px;'>
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#supportingDocsType">Add Document Category</button>
	
</p>
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#supportingDocs">Add Document </button>
	
</p>
<div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">									
                                    <h3 class="box-title">Document Category List</h3>
									<div class="col-md-4 col-md-offset-3  position">
										<form action="" class="search-form">
											
										</form>
									</div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									
                                    <table class="table table-bordered table-hover dataTable">
															
										<tbody >
										
											 <tr>
											 <th>Doc Type</th><th>Edit</th><th>S.Delete</th><th>P.Delete</th>
											</tr>
											@foreach($docTypes as $docType)
											<tr>
												<td>{{$docType->doc_type}}</td>
												<td> 
									@if('true'==CommonFunction::hasPermission('e_library',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updateSupportingDocsType{{$docType->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										 </a>
									 @endif
									 </td>
									  <td> @if('true'==CommonFunction::hasPermission('e_library',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('lib_suporting_docs_type', $docType->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif</td>
									 	
									 <td> @if('true'==CommonFunction::hasPermission('e_library',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('lib_suporting_docs_type',$docType->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif</td>
											</tr>
											@endforeach
									
										</tbody>
								
							
								
										
									</table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div>    
</section>
@include('library.supportingDocuments.entryForm')
@yield('newSupportingDocs')
@include('library.supportingDocuments.editForm')
@yield('updateTypes')

@stop