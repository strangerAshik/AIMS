@section('aircraftMenuPrimary')
<div class='row col-md-12'>
		
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block " data-toggle="modal" data-target="#PrimaryInfoForm">Add Aircraft Primary Record</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block " disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Type Certificate Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Aircraft STC Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Aircraft exemption Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Aircraft Registration Number Information</button>
				</p>
		
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"  disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Airworthiness Certificate Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"  disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Aircraft CAA Approval Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"  disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Aircraft Owner Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"  disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Aircraft Lessee Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"  disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Aircraft Insurer Information</button>
				</p>
		
			<p class="text-center col-md-12">
				<button class="btn btn-primary btn-block"  disabled="disabled" data-toggle="modal" data-target="#EmploymentDetails">Add Aircraft Equipment Review Information</button>
			</p>
		
</div>
@stop
@section('aircraftMenuDetails')

<div class='row col-md-12'>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"  disabled="disabled" data-toggle="modal" data-target="#PrimaryInfoForm">Add Aircraft Primary Record</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block box-shadow" data-toggle="modal" data-target="#TCIForm">Add Type Certificate Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#STCForm">Add Aircraft STC Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#exemptionForm">Add Aircraft exemption Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#registrationInfoForm">Add Aircraft Registration Number Information</button>
				</p>
		
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#ACForm">Add Airworthiness Certificate Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#approvalForm">Add Aircraft CAA Approval Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#ownerForm">Add Aircraft Owner Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#lesseeForm">Add Aircraft Lessee Information</button>
				</p>
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#insurerForm">Add Aircraft Insurer Information</button>
				</p>
		
			<p class="text-center col-md-12">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#equipmentReviewForm">Add Aircraft Equipment Review Information</button>
			</p>
		
</div>
@stop