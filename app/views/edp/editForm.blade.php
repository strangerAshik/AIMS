

@if($PageName=='New Safety Concern'||$PageName=='Single Inspection'||$PageName=='New Action Entry'||$PageName=='Single EDP')	
@section('updateEdp') 
@foreach ($edpDetails as $info) 
<div class="modal fade" id="updateEdp{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Update EDP</h4>
         </div>
         <div class="modal-body">
            <!-- The form is placed inside the body of modal -->
            {{Form::open(array('url' => 'edp/updateEdpPrimary', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
            {{Form::hidden('edp_number','EDP_'.date('d').'_'.date('m').'_'.date('y').'_'.time())}}
            {{Form::hidden('id', $info->id)}}
            {{Form::hidden('old_enforcement_action_file', $info->enforcement_action_file)}}
            {{Form::hidden('old_admin_opinion_file', $info->admin_opinion_file)}}
            {{Form::hidden('old_legal_opinion_file', $info->legal_opinion_file)}}
            <div class="form-group required">
               {{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('title',$info->title, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('date', 'Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <?php $date=CommonFunction::date($info->date); ?>
                  <div class="col-xs-2">
                     {{Form::select('date', $dates,$date,array('class'=>'form-control','required'=>''))}}
                  </div>
                  <?php $month=CommonFunction::month($info->date); ?>
                  <div class="col-xs-3">
                     {{Form::select('month',$months,$month,array('class'=>'form-control','required'=>''))}}
                  </div>
                  <?php $year=CommonFunction::year($info->date); ?>
                  <div class="col-xs-2">
                     {{Form::select('year',$years,$year,array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('sia_number ', 'SIA/ Tracking Number', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <select id="edp_sia_number"  name='sia_number' class="demo-default" placeholder="Select 70000 if program type is Not Planned...">
                     <option value="{{$info->sia_number}}">{{$info->sia_number}}</option>
                     @foreach($toDayProgram as $option)
                     <option value="{{$option}}">{{$option}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('finding_number ', 'Finding Number', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <select id="finding_number{{$info->id}}"  name='finding_number' class="demo-default" placeholder="Select Finding Number">
                     <option value="{{$info->finding_number}}">{{$info->finding_number}}</option>
                     <?php $options=CommonFunction::siaActionListedSiaNumber();?>
                     @foreach($options as $option)
                     <option value="{{$option}}">{{$option}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('sc_number ', 'SC Number', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <select id="sc_number{{$info->id}}"  name='sc_number' class="demo-default" placeholder="Select SC Number">
                     <?php $options=CommonFunction::siaActionListedSiaNumber();?>
                     <option value="{{$info->sc_number}}">{{$info->sc_number}}</option>
                     @foreach($options as $option)
                     <option value="{{$option}}">{{$option}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('severity_level', 'Severity Level', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">											
                  {{Form::select('severity_level', array(''=>'--select--','Catastrophic'=>'Catastrophic','Critical'=>'Critical','Marginal'=>'Marginal','Negligible'=>'Negligible'),$info->severity_level,array('class'=>'form-control'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('severity_explanation', 'Explanation', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('severity_explanation',$info->severity_explanation, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('likelihood_level', 'Likelihood Level', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">											
                  {{Form::select('likelihood_level', array(''=>'--select--','Frequent'=>'Frequent','Occasional'=>'Occasional','Remote'=>'Remote'),$info->likelihood_level,array('class'=>'form-control'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('likelihood_explanation', 'Explanation', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('likelihood_explanation',$info->likelihood_explanation, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('level_of_risk', 'Level Of Risk Selected', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::select('level_of_risk', array(''=>'--select--','High Risk'=>'High Risk','Moderate Risk'=>'Moderate Risk','Low Risk'=>'Low Risk'),$info->level_of_risk,array('class'=>'form-control'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('type_of_action', 'Type Of Action Selected', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <?php $options=CommonFunction::getOptions('edp_type_of_action_selected')?>
                  <select id="type_of_action{{$info->id}}"  multiple name="type_of_action[]" class="demo-default" >
                     @if($type_of_action=CommonFunction::updateMultiSelection('edp_primary', 'id',$info->id,'type_of_action'))
                     @foreach($type_of_action as $key=>$value)
                     <option selected='selected' value="{{$value}}">{{$value}}</option>
                     @endforeach
                     @else 
                     <option  value="">--Select--</option>
                     @endif
                     @foreach($options as $option)
                     <option value="{{$option}}">{{$option}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('deviation_procedure', 'Has Deviation /Exemption Procedure?', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <div class="radio">									 
                     <label> {{ Form::radio('deviation_procedure', 'Yes',Input::old('deviation_procedure', $info->deviation_procedure == 'Yes'),array()) }} &nbsp  Yes</label>
                     <label> {{ Form::radio('deviation_procedure', 'No',Input::old('deviation_procedure', $info->deviation_procedure == 'No'),array()) }} &nbsp  No</label>
                  </div>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('if_yes_explain_deviation_procedure', 'If Yes Explain(Deviation/Exemption Procedure)', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('if_yes_explain_deviation_procedure',$info->if_yes_explain_deviation_procedure, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('remedial_action', 'Remedial Action', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('remedial_action',$info->remedial_action, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('written_explanation', 'Written Explanation For Admin Action', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('written_explanation',$info->written_explanation, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('recommendation_for_legal_enf', 'Recommendation For Legal Enforcement (If Appropriate)', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('recommendation_for_legal_enf',$info->recommendation_for_legal_enf, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('edp_peocess_outcome_requested', 'EDP Process Outcome Requested', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <div class="radio">									 
                     <label> {{ Form::radio('edp_peocess_outcome_requested', 'Yes',Input::old('edp_peocess_outcome_requested', $info->edp_peocess_outcome_requested == 'Yes'),array()) }} &nbsp  Yes</label>
                     <label> {{ Form::radio('edp_peocess_outcome_requested', 'No',Input::old('edp_peocess_outcome_requested', $info->edp_peocess_outcome_requested == 'No'),array()) }} &nbsp  No</label>
                  </div>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('if_yes_explain_outcome_requested', 'If Yes Explain & Justification', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('if_yes_explain_outcome_requested',$info->if_yes_explain_outcome_requested, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('remedial_measure', 'Remedial Measure', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('remedial_measure',$info->remedial_measure, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('enforcement_decision_outcome', 'Enforcement Decision Outcome', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">											
                  {{Form::select('enforcement_decision_outcome', array(''=>'--select--','Legal'=>'Legal','Admin'=>'Admin','Warning Letter'=>'Warning Letter','Any Other'=>'Any Other'),$info->enforcement_decision_outcome,array('class'=>'form-control'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('enforcement_action', 'Enforcement Action', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('enforcement_action',$info->enforcement_action, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('file', 'Uploaded File (Enforcement Action)', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  @if($info->enforcement_action_file!='Null'){{HTML::link('files/sia_enforcement_action_file/'.$info->enforcement_action_file,'Document',array('target'=>'_blank'))}}
                  @else
                  {{HTML::link('#','No Document Provided')}}
                  @endif
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('file', 'Upload Updated File (Enforcement Action)', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::file('enforcement_action_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('admin_opinion', 'Admin Opinion', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('admin_opinion',$info->admin_opinion, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('file', 'Uploaded File (Admin Opinion)', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  @if($info->admin_opinion_file!='Null'){{HTML::link('files/edp_legal_admin_opinion_file/'.$info->admin_opinion_file,'Document',array('target'=>'_blank'))}}
                  @else
                  {{HTML::link('#','No Document Provided')}}
                  @endif
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('file', 'Upload updated File (Admin Opinion)', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::file('admin_opinion_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('legal_opinion', 'Legal Opinion', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('legal_opinion',$info->legal_opinion, array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('file', 'Uploaded File (Legal Opinion)', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  @if($info->legal_opinion_file!='Null'){{HTML::link('files/edp_legal_admin_opinion_file/'.$info->legal_opinion_file,'Document',array('target'=>'_blank'))}}
                  @else
                  {{HTML::link('#','No Document Provided')}}
                  @endif
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('file', 'Upload updated File (Legal Opinion)', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::file('legal_opinion_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
               </div>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
               {{Form::close()}}
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
   
   $('#edp_sia_number').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
   $('#type_of_issue').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
   $('#assigned_inspector').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
   //$('#aircraft_msn').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
   $('#provided_to').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
   $('#final_regulation_inspector').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
   $('#final_regulation_method').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
   
   
   //multiple selection from options
   var eventHandler = function(name) {
   				return function() {
   					console.log(name, arguments);
   					$('#log').append('<div><span class="name">' + name + '</span></div>');
   				};
   			};
   var $select = $('#type_of_action{{$info->id}}').selectize({
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
   var $select = $('#finding_number{{$info->id}}').selectize({
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
   var $select = $('#sc_number{{$info->id}}').selectize({
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
@stop
@endif
@if($PageName=='Single EDP')
@section('updateLegalOps')
@foreach($legalOpinions as $opinion)
<div class="modal fade" id="updatelegalOpenion{{$opinion->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Opinion Of Legal Department </h4>
         </div>
         <div class="modal-body">
            <!-- The form is placed inside the body of modal -->
            {{Form::open(array('url' => 'edp/updateLegalOpinion', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
            {{Form::hidden('id',$opinion->id)}}
             <?php $docs=CommonFunction::documentInfo('edp_legal_opinion',$opinion->id)?>
            {{Form::hidden('old_doc',$docs)}} 
           
            <div class="form-group required">
               {{Form::label('legal_openion', 'Legal Opinion', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('legal_openion',$opinion->legal_openion, array('class' => 'form-control','placeholder'=>'','size'=>'4x3','required'=>''))}}
               </div>
            </div>
            
            <div class="form-group ">
                                     
                              {{Form::label('doc', 'Uploaded Document', array('class' => 'col-xs-4 control-label'))}}
                              <div class="col-xs-6">
                              <?php $docs=CommonFunction::documentInfo('edp_legal_opinion',$opinion->id)?>
            @if($docs!='Null'){{HTML::link('files/documents/'.$docs,'Document',array('target'=>'_blank'))}}
                        @else
                           {{HTML::link('#','No Document Provided')}}
                        @endif
                              </div>
                              
            </div>
            <div class="form-group ">
                                     
                              {{Form::label('doc', 'Upload Updated Doc', array('class' => 'col-xs-4 control-label'))}}
                              <div class="col-xs-6">
                              {{Form::file('doc',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
                              </div>
                              
            </div>

            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
               {{Form::close()}}
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
   
   
   //$('#approved_by').selectize({create: true, sortField: {field: 'text',direction: 'asc' }});
   
   });
</script>
@endforeach
@stop
@endif
@if($PageName=='Single EDP')
@section('updateApprovalForm')
@foreach($approvalInfos as $info)
<div class="modal fade" id="updateApprovalInfos{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Update Approval</h4>
         </div>
         <div class="modal-body">
            <!-- The form is placed inside the body of modal -->
            {{Form::open(array('url' => 'edp/updateApproval', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
            {{Form::hidden('id',$info->id)}}
            <div class="form-group required">
               {{Form::label('approved_by', 'Approved By', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('approved_by',$info->approved_by, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('designation',$info->designation, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('approval_date', 'Approval Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     <?php $date=CommonFunction::date($info->approval_date);?>
                     {{Form::select('approval_date', $dates , $date ,array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     <?php $month=CommonFunction::month($info->approval_date);?>
                     {{Form::select('approval_month', $months ,$month ,array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     <?php $year=CommonFunction::year($info->approval_date);?>
                     {{Form::select('approval_year', $years , $year ,array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('approval_note', 'Note', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('approval_note',$info->approval_note, array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
               </div>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
               {{Form::close()}}
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
   
   
   //$('#approved_by').selectize({create: true, sortField: {field: 'text',direction: 'asc' }});
   
   });
</script>
@endforeach
@stop
@endif

