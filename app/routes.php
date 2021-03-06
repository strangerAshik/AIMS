<?php



/*

|--------------------------------------------------------------------------

| Application Routes

|--------------------------------------------------------------------------

|

| Here is where you can register all of the routes for an application.

| It's a breeze. Simply tell Laravel the URIs it should respond to

| and give it the Closure to execute when that URI is requested.

|

*/

//Start Role Initialization 

Route::get('layoutTable',function(){

	return View::make('layoutTable');

});


Route::get('permission/{emp_id}','SettingsController@permission');


Route::get('login',function(){

	return Redirect::to('/');

});

Route::post('login','SettingsController@login');



Route::group(array('before'=>'auth'),function(){	

	Route::get('dashboard','DashboardController@index');

});



Route::get('/',function(){

	return View::make('welcome.index');

});

Route::get('contact',function(){

	return View::make('welcome.contact');

});

Route::get('volanteerReporting',function(){

	return View::make('welcome.volanteerReporting');

});

Route::get('faq',function(){

	return View::make('welcome.faq');

});

Route::get('about',function(){

	return View::make('welcome.about');

});



Route::group(array('before'=>'auth'),function(){
// Role routes
	Route::get('roleManagment','SettingsController@roleManagment');
	Route::post('saveRole','SettingsController@saveRole');
	Route::post('editRole','SettingsController@editRole');
	Route::get('roleNameDelete/{id}','SettingsController@roleNameDelete');

	Route::get('rolePrivillage/{role_id}','SettingsController@rolePrivillage');
	Route::post('saveRolePrivileges','SettingsController@saveRolePrivileges');
	Route::post('editRolePrivileges','SettingsController@editRolePrivileges');

	Route::get('removeIndividualPrivilegeArea/{id}','SettingsController@removeIndividualPrivilegeArea');

	Route::get('privilageUpdateToAllOfThisRole/{role_id}','SettingsController@privilageUpdateToAllOfThisRole');

	Route::get('rolePrivillageDetails/{role_id}/{section_id}','SettingsController@rolePrivillageDetails');
	Route::post('updatePrivilegeAreaPermission','SettingsController@updatePrivilegeAreaPermission');
//End role toutes
	Route::get('settings','SettingsController@index');

	Route::get('logout','SettingsController@logout');

	Route::get('viewUsers','SettingsController@viewUsers');

	Route::get('singleUser/{emp_id}','SettingsController@singleUser');
	//Module start
	Route::get('viewModule','SettingsController@viewModule');
	Route::get('moduleInstruction/{id}','SettingsController@moduleInstruction');
	Route::get('moduleInstructionManagment/{moduleName}','SettingsController@moduleInstructionManagment');
	Route::get('moduleRepors/{id}','SettingsController@moduleRepors');
	Route::get('moduleReporManage/{module_name}','SettingsController@moduleReporManage');
	
	Route::post('saveModule','SettingsController@saveModule');
	Route::post('updateModule','SettingsController@updateModule');
	Route::post('saveModuleInstruction','SettingsController@saveModuleInstruction');
	Route::post('saveModuleReports','SettingsController@saveModuleReports');
	//Module start End 

	Route::post('newUser/save','SettingsController@saveUser');

	Route::post('newUser/update','SettingsController@update');

	Route::post('newModulePermissionupdate','SettingsController@newModulePermissionupdate');

	Route::post('user/delete','SettingsController@delete');

	

	Route::get('myProfile','SettingsController@myProfile');

	Route::post('updateMyProfile','SettingsController@updateMyProfile');

	Route::post('updateUserProfileAdmin','SettingsController@updateUserProfileAdmin');

	Route::post('updateUserPermission','SettingsController@updateUserPermission');

	Route::get('dropdownManagement','SettingsController@dropdownManagement');

	Route::post('saveDropDownOption','SettingsController@saveDropDownOption');

	Route::get('singleDropdown/{dropdown_names}/{core_module_names}','SettingsController@singleDropdown');

	Route::post('updateOption','SettingsController@updateOption');

	Route::get('checkListManagement','SettingsController@checkListManagement');

	Route::post('saveChecklistQuestion','SettingsController@saveChecklistQuestion');

	Route::get('singleChecklist/{name}/{type}','SettingsController@singleChecklist');

	Route::post('saveQuestion','SettingsController@saveQuestion');

	//not in use
	Route::post('changePassword','SettingsController@changePassword');
	//in use
	Route::get('changeAllPassword','SettingsController@changeAllPassword');
	Route::post('changePasswordIndividual/{id}','SettingsController@changePasswordIndividual');
	
	Route::get('permissionUpdate','SettingsController@permissionUpdate');
	//delete user with module privillage
	Route::get('userDelete/{emp_id}','SettingsController@userDelete');

});
Route::group(array('before'=>'auth'),function(){
//approve

	Route::get('approve/{table}/{id}/{pageId}','BaseController@approve');

	Route::get('notApprove/{table}/{id}/{pageId}','BaseController@notApprove');

	//warning

	Route::get('warning/{table}/{id}/{pageId}','BaseController@warning');

	Route::get('removeWarning/{table}/{id}/{pageId}','BaseController@removeWarning');

	//soft delete

	Route::get('softDelete/{table}/{id}/{pageId}','BaseController@softDelete');

	Route::get('undoSoftDelete/{table}/{id}/{pageId}','BaseController@undoSoftDelete');

	//permanent delete 

	Route::get('permanentDelete/{table}/{id}/{pageId}','BaseController@permanentDelete');
});

Route::group(array('prefix' => 'aircraft','before'=>'auth'),function(){

	Route::get('main','AircraftController@main');

	

	Route::post('savePrimary','AircraftController@savePrimary');

	Route::post('editPrimary','AircraftController@editPrimary');

	Route::post('saveTCI','AircraftController@saveTCI');

	Route::post('editTCI','AircraftController@editTCI');

	Route::post('saveSTC','AircraftController@saveSTC');

	Route::post('editSTC','AircraftController@editSTC');

	Route::post('saveExemption','AircraftController@saveExemption');

	Route::post('editExemption','AircraftController@editExemption');

	Route::post('saveRegistrationInfo','AircraftController@saveRegistrationInfo');

	Route::post('editRegistrationInfo','AircraftController@editRegistrationInfo');

	Route::post('saveAC','AircraftController@saveAC');

	Route::post('editAC','AircraftController@editAC');

	Route::post('saveApproval','AircraftController@saveApproval');

	Route::post('editApproval','AircraftController@editApproval');

	Route::post('saveOwner','AircraftController@saveOwner');

	Route::post('editOwner','AircraftController@editOwner');

	Route::post('saveLessee','AircraftController@saveLessee');

	Route::post('editLessee','AircraftController@editLessee');

	Route::post('saveInsurer','AircraftController@saveInsurer');

	Route::post('editInsurer','AircraftController@editInsurer');

	Route::post('saveEquipmentReview','AircraftController@saveEquipmentReview');

	Route::post('editEquipmentReview','AircraftController@editEquipmentReview');

	

	Route::get('single/{mm}/{msn}','AircraftController@aircraftSingle');

	Route::get('new_aircraft','AircraftController@addNewAircraft');

	Route::get('aircraftList','AircraftController@aircraftList');
	Route::get('myAircraftList','AircraftController@myAircraftList');

	//approve

	Route::get('approve/{table}/{id}','AircraftController@approve');

	Route::get('notApprove/{table}/{id}','AircraftController@notApprove');

	//warning

	Route::get('warning/{table}/{id}','AircraftController@warning');

	Route::get('removeWarning/{table}/{id}','AircraftController@removeWarning');

	//soft delete

	Route::get('softDelete/{table}/{id}','AircraftController@softDelete');

	Route::get('undoSoftDelete/{table}/{id}','AircraftController@undoSoftDelete');

	//permanent delete 

	Route::get('permanentDelete/{table}/{id}','AircraftController@permanentDelete');
	//Central Search 
	Route::get('summary','AircraftController@summary');
	//notification
	Route::get('notification','AircraftController@notification');
	
	//report
	Route::get('report','AircraftController@report');
	Route::get('reportByDateToDate','AircraftController@reportByDateToDate');
//*************Aircraft Notification******************* 
	Route::get('primaryAprovalWaiting','AircraftController@primaryAprovalWaiting');
	Route::get('tcAprovalWaiting','AircraftController@tcAprovalWaiting');
	Route::get('stcAprovalWaiting','AircraftController@stcAprovalWaiting');
	Route::get('exemptionAprovalWaiting','AircraftController@exemptionAprovalWaiting');
	Route::get('registrationAprovalWaiting','AircraftController@registrationAprovalWaiting');
	Route::get('airworthinessAprovalWaiting','AircraftController@airworthinessAprovalWaiting');
	Route::get('caaAprovalWaiting','AircraftController@caaAprovalWaiting');
	Route::get('ownerAprovalWaiting','AircraftController@ownerAprovalWaiting');
	Route::get('lesseeAprovalWaiting','AircraftController@lesseeAprovalWaiting');
	Route::get('insurerAprovalWaiting','AircraftController@insurerAprovalWaiting');
	Route::get('equipmentReviewAprovalWaiting','AircraftController@equipmentReviewAprovalWaiting');

});



Route::group(array('prefix' => 'qualification','before'=>'auth'), function()

{

	Route::get('notification','QualificationController@notification');
	Route::get('approvalPendingPersonalInfo','QualificationController@approvalPendingPersonalInfo');
	Route::get('approvalPendingAcademicQualification','QualificationController@approvalPendingAcademicQualification');
	Route::get('approvalPendingThesis','QualificationController@approvalPendingThesis');
	Route::get('approvalPendingEmployment','QualificationController@approvalPendingEmployment');
	Route::get('approvalPendingProfessionalDeg','QualificationController@approvalPendingProfessionalDeg');
	Route::get('approvalPendingTraining','QualificationController@approvalPendingTraining');
	Route::get('approvalPendingLanguage','QualificationController@approvalPendingLanguage');
	Route::get('approvalPendingMembership','QualificationController@approvalPendingMembership');
	Route::get('approvalPendingPublication','QualificationController@approvalPendingPublication');
	Route::get('approvalPendingTechnicalLicence','QualificationController@approvalPendingTechnicalLicence');
	Route::get('approvalPendingAircraftQuali','QualificationController@approvalPendingAircraftQuali');
	Route::get('approvalPendingReference','QualificationController@approvalPendingReference');
	Route::get('approvalPendingAssignment','QualificationController@approvalPendingAssignment');


	Route::get('employees','QualificationController@employees');

	Route::get('trainingArchive','QualificationController@trainingArchive'); 

	Route::get('singleTrainingArchive/{id}','QualificationController@singleTrainingArchive');

	Route::get('empTaskList','QualificationController@empTaskList'); 

	Route::get('singleEmpTask/{id}','QualificationController@singleEmpTask'); 

	Route::get('main','QualificationController@main'); 

	Route::get('pdf','QualificationController@pdf'); 

	Route::get('personnel', 'QualificationController@personnel');

	Route::get('education', 'QualificationController@education');

	Route::get('employment', 'QualificationController@employment');

	Route::get('pro_degree', 'QualificationController@pro_degree');

	Route::get('taining_work_ojt', 'QualificationController@taining_work_ojt');

	Route::get('language', 'QualificationController@language');

	Route::get('technical_licence', 'QualificationController@technical_licence');

	Route::get('aircraft_qualification', 'QualificationController@aircraft_qualification');

	Route::get('reference', 'QualificationController@reference');

	Route::get('emp_verification', 'QualificationController@emp_verification');

	Route::get('other', 'QualificationController@other');

	Route::get('comp_view', 'QualificationController@comp_view_per');

	Route::get('comp_view/{id}', 'QualificationController@comp_view');

	//insert data

	Route::post('savePersonnel', 'QualificationController@savePersonnel');

	Route::post('saveAccademic', 'QualificationController@saveAccademic');

	Route::post('saveThesis', 'QualificationController@saveThesis');

	Route::post('saveEmploymentHistory', 'QualificationController@saveEmploymentHistory');

	Route::post('pro_degree', 'QualificationController@proDegree');

	Route::post('saveTrainingWorkOJT','QualificationController@saveTrainingWorkOJT');

	Route::post('saveLanguage','QualificationController@saveLanguage');

	Route::post('saveTechnicalLicence','QualificationController@saveTechnicalLicence');

    Route::post('saveAircraftQualification','QualificationController@saveAircraftQualification');

	Route::post('saveReference','QualificationController@saveReference');

	Route::post('EmpVerification','QualificationController@EmpVerification');

	Route::post('savePublication','QualificationController@savePublication');

	Route::post('saveMembership','QualificationController@saveMembership');

	//delete data 

	Route::get('deletePersonnel/{id}','QualificationController@deletePersonnel' );

	Route::get('deleteAccademic/{id}', 'QualificationController@deleteAccademic');

	Route::get('deleteThesis/{id}', 'QualificationController@deleteThesis');

	Route::get('deleteEmployment/{id}','QualificationController@deleteEmployment');

	Route::get('deleteProDegree/{id}', 'QualificationController@deleteProDegree');

	Route::get('deleteTraining/{id}', 'QualificationController@deleteTraining');

	Route::get('deleteLanguage/{id}', 'QualificationController@deleteLanguage');

	Route::get('deleteTechlicence/{id}','QualificationController@deleteTechlicence');

	Route::get('deleteAirQualification/{id}','QualificationController@deleteAirQualification' );

	Route::get('deleteReference/{id}','QualificationController@deleteReference');

	Route::get('deleteEnpVeri/{id}','QualificationController@deleteEnpVeri');

	Route::get('deletePublication/{id}','QualificationController@deletePublication');

	Route::get('deleteMembership/{id}','QualificationController@deleteMembership');

	//Edit data

	Route::post('editPersonnel', 'QualificationController@editPersonnel');

	Route::post('updateAccademic', 'QualificationController@updateAccademic');

	Route::post('updateThesis', 'QualificationController@updateThesis');

	Route::post('updateEmployment', 'QualificationController@updateEmployment');

	Route::post('updatePro_degree', 'QualificationController@updatePro_degree');

	Route::post('updateTrainingWorkOJT', 'QualificationController@updateTrainingWorkOJT');

	Route::post('updateLanguage', 'QualificationController@updateLanguage');

	Route::post('updateTechnicalLicence', 'QualificationController@updateTechnicalLicence');

	Route::post('updateAircraftQualification', 'QualificationController@updateAircraftQualification');

	Route::post('updateReference', 'QualificationController@updateReference');

	Route::post('updateEmpVerification', 'QualificationController@updateEmpVerification');

	Route::post('updatePublication', 'QualificationController@updatePublication');

	Route::post('updateMembership', 'QualificationController@updateMembership');

	//Approve Data

	Route::get('approve/{table}/{id}','QualificationController@approve');
	Route::get('notApprove/{table}/{id}','QualificationController@notApprove');

	//report
	Route::get('report','QualificationController@report');
	Route::get('reportByDateToDate','QualificationController@reportByDateToDate');

	//emp summary 
	Route::get('summary','QualificationController@summary');


});



Route::group(array('prefix'=>'safety','before'=>'auth'),function(){

	Route::get('main','safetyConcernsController@main');

	//entry Form

	Route::get('newSafetyConcern','safetyConcernsController@newSafetyConcern');

	//

	Route::get('newInspection','safetyConcernsController@newInspection');

	Route::get('singleInspection/{ins_num}','safetyConcernsController@singleInspection');

	

	Route::get('singlesafetyConcern/{sc_num}','safetyConcernsController@singlesafetyConcern');

	Route::get('followUp/{sc_num}','safetyConcernsController@followUp');

	//view list

	Route::get('issuedList','safetyConcernsController@issuedList');

	Route::get('nonStandardIssuedList','safetyConcernsController@nonStandardIssuedList');

	

	//save entry 

	//Route::post('safetyConcern/save','safetyConcernsController@save');

	Route::post('savePrimaryInspection','safetyConcernsController@savePrimaryInspection');

	Route::post('updatePrimaryInspection','safetyConcernsController@updatePrimaryInspection');

	Route::post('saveSafetyConcern','safetyConcernsController@saveSafetyConcern');

	Route::post('updateSafetyConcern','safetyConcernsController@updateSafetyConcern');

	Route::post('saveCorrectiveAction','safetyConcernsController@saveCorrectiveAction');

	Route::post('updateCorrectiveAction','safetyConcernsController@updateCorrectiveAction');

	Route::post('saveFollowUp','safetyConcernsController@saveFollowUp');

	Route::post('saveApprovalForm','safetyConcernsController@saveApprovalForm');

	Route::post('updateApprovalForm','safetyConcernsController@updateApprovalForm');

	Route::post('saveForwardingInfo','safetyConcernsController@saveForwardingInfo');

	Route::post('updateForwardingInfo','safetyConcernsController@updateForwardingInfo');

	Route::post('saveLegalOpinion','safetyConcernsController@saveLegalOpinion');

	Route::post('updateLegalOpinion','safetyConcernsController@updateLegalOpinion');

	

	Route::post('safetyConcern/update','safetyConcernsController@update');



	Route::post('saveFinzalization','safetyConcernsController@saveFinzalization');

	Route::post('updatefinzalization','safetyConcernsController@updatefinzalization');

	//report
	Route::get('report','safetyConcernsController@report');
	Route::get('reportByDateToDate','safetyConcernsController@reportByDateToDate');

});



Route::group(array('prefix'=>'library','before'=>'auth'),function(){

	Route::get('main','libraryController@main');

	Route::get('newSupportingDocuments','libraryController@newSupportingDocuments');

	Route::post('saveSupportingDocument','libraryController@saveSupportingDocument');

	Route::post('updateSupportingDocument','libraryController@updateSupportingDocument');

	Route::post('saveSupportingDocumentType','libraryController@saveSupportingDocumentType');

	Route::post('updateSupportingDocumentType','libraryController@updateSupportingDocumentType');

	Route::get('privateView','libraryController@privateView');	

	Route::get('publicView','libraryController@publicView');

	//report
	Route::get('report','libraryController@report');
	Route::get('reportByDateToDate','libraryController@reportByDateToDate');



});



Route::get('libraryPublicView','PublicController@SDpublicView');
Route::post('sendMessage','PublicController@sendMessage');


Route::group(array('prefix'=>'organization','before'=>'auth'),function(){

	Route::get('main','organizationController@main');

	Route::get('organizationList','organizationController@organizationList');

	Route::get('myOrganization','organizationController@myOrganization');

	Route::get('newOrganization','organizationController@newOrganization');

	Route::get('singleOrganization/{orgNum}','organizationController@singleOrganization');

	

	Route::post('saveOrgPrimary','organizationController@saveOrgPrimary');

	Route::post('updateOrgPrimary','organizationController@updateOrgPrimary');



	Route::post('saveOrgbusinessName','organizationController@saveOrgbusinessName');

	Route::post('updateOrgbusinessName','organizationController@updateOrgbusinessName');



	Route::post('saveOrgCertificate','organizationController@saveOrgCertificate');

	Route::post('updateOrgCertificate','organizationController@updateOrgCertificate');



	Route::post('saveOrgBaseLocation','organizationController@saveOrgBaseLocation');

	Route::post('updateOrgBaseLocation','organizationController@updateOrgBaseLocation');



	Route::post('saveOrgManagementContact','organizationController@saveOrgManagementContact');

	Route::post('updateOrgManagementContact','organizationController@updateOrgManagementContact');



	Route::post('saveOrgCAAContact','organizationController@saveOrgCAAContact');

	Route::post('updateOrgCAAContact','organizationController@updateOrgCAAContact');



	Route::post('saveOrgExemptionsDivination','organizationController@saveOrgExemptionsDivination');

	Route::post('updateOrgExemptionsDivination','organizationController@updateOrgExemptionsDivination');



	Route::post('saveOrgAircraftListing','organizationController@saveOrgAircraftListing');

	Route::post('updateOrgAircraftListing','organizationController@updateOrgAircraftListing');	



	Route::post('saveOrgPolicyMenualApproval','organizationController@saveOrgPolicyMenualApproval');

	Route::post('updateOrgPolicyMenualApproval','organizationController@updateOrgPolicyMenualApproval');



	Route::post('saveOrgComplexityReview','organizationController@saveOrgComplexityReview');

	Route::post('updateOrgComplexityReview','organizationController@updateOrgComplexityReview');



	Route::post('saveOrgAerialWorkApproval','organizationController@saveOrgAerialWorkApproval');

	Route::post('updateOrgAerialWorkApproval','organizationController@updateOrgAerialWorkApproval');



	Route::post('saveOrgNonCertificatedOperation','organizationController@saveOrgNonCertificatedOperation');

	Route::post('updateOrgNonCertificatedOperation','organizationController@updateOrgNonCertificatedOperation');



	Route::post('saveOrgFlightOperationsApproval','organizationController@saveOrgFlightOperationsApproval');

	Route::post('updateOrgFlightOperationsApproval','organizationController@updateOrgFlightOperationsApproval');



	Route::post('saveOrgFleetOperationApproval','organizationController@saveOrgFleetOperationApproval');

	Route::post('updateOrgFleetOperationApproval','organizationController@updateOrgFleetOperationApproval');



	Route::post('saveOrgFleetMaintananceApproval','organizationController@saveOrgFleetMaintananceApproval');

	Route::post('updateOrgFleetMaintananceApproval','organizationController@updateOrgFleetMaintananceApproval');



	Route::post('saveOrgAirportAuth','organizationController@saveOrgAirportAuth');

	Route::post('updateOrgAirportAuth','organizationController@updateOrgAirportAuth');



	Route::post('saveOrgLeasingArrangment','organizationController@saveOrgLeasingArrangment');

	Route::post('updateOrgLeasingArrangment','organizationController@updateOrgLeasingArrangment');



	Route::post('saveOrgContractedService','organizationController@saveOrgContractedService');

	Route::post('updateOrgContractedService','organizationController@updateOrgContractedService');



	Route::post('saveOrgAmoApproval','organizationController@saveOrgAmoApproval');

	Route::post('updateOrgAmoApproval','organizationController@updateOrgAmoApproval');



	Route::post('saveOrgAtoApproval','organizationController@saveOrgAtoApproval');

	Route::post('updateOrgAtoApproval','organizationController@updateOrgAtoApproval');



	Route::post('saveOrgAocApprovalArea','organizationController@saveOrgAocApprovalArea');

	Route::post('updateOrgAocApprovalArea','organizationController@updateOrgAocApprovalArea');



	Route::post('saveOrgAocApprovalRoute','organizationController@saveOrgAocApprovalRoute');

	Route::post('updateOrgAocApprovalRoute','organizationController@updateOrgAocApprovalRoute');



	Route::post('saveOrgAocMaintenanceArrangement','organizationController@saveOrgAocMaintenanceArrangement');

	Route::post('updateOrgAocMaintenanceArrangement','organizationController@updateOrgAocMaintenanceArrangement');



	Route::post('saveOrgAocTrainingArrangement','organizationController@saveOrgAocTrainingArrangement');

	Route::post('updateOrgAocTrainingArrangement','organizationController@updateOrgAocTrainingArrangement');



	Route::post('saveOrgApprovalSimulator','organizationController@saveOrgApprovalSimulator');

	Route::post('updateOrgApprovalSimulator','organizationController@updateOrgApprovalSimulator');



	Route::post('saveOrgFinancialStatus','organizationController@saveOrgFinancialStatus');

	Route::post('UpdateOrgFinancialStatus','organizationController@UpdateOrgFinancialStatus');



	Route::post('saveOrgOpsSpec','organizationController@saveOrgOpsSpec');

	Route::post('updateOrgOpsSpec','organizationController@updateOrgOpsSpec');

	

	Route::post('saveOrgAocCertificate','organizationController@saveOrgAocCertificate');

	Route::post('updateOrgAocCertificate','organizationController@updateOrgAocCertificate');

	

	Route::post('saveOrgDocument','organizationController@saveOrgDocument');


});
/*Certification ogr routes*/
Route::group(array('prefix'=>'certification','before'=>'auth'),function(){

	Route::get('certificationMain','CertificationController@certificationMain');
	Route::get('mycertification','CertificationController@mycertification');
	Route::get('singleCertification/{cerNo}','CertificationController@singleCertification');
	Route::get('singleDocs/{docNo}','CertificationController@singleDocs');
	Route::get('singleFinding/{FN}','CertificationController@singleFinding');
	Route::get('followup/{cerNo}','CertificationController@followup');
	//all phasecs
	Route::get('allPhases','CertificationController@allPhases');
	Route::get('phaseDetails/{certificate_id}/{category}','CertificationController@phaseDetails');
	Route::get('eventDetails/{certificate_id}/{event_id}','CertificationController@eventDetails');
	Route::get('timelines','CertificationController@timelines');
	Route::post('saveEventRecord','CertificationController@saveEventRecord');

	Route::get('formDelete/{certiFormInputId}','CertificationController@formDelete');

	Route::post('saveRecordFinding','CertificationController@saveRecordFinding');
	Route::post('updateStatus','CertificationController@updateStatus');

	//Admin
	Route::get('addPhase','CertificationController@addPhase');
	Route::post('savePhase','CertificationController@savePhase');
	Route::get('phase/{phaseId}','CertificationController@phase');
	Route::get('timeline/{phaseId}','CertificationController@timeline');
	Route::post('saveTimeline','CertificationController@saveTimeline');

	Route::get('document/{phaseId}','CertificationController@document');
	Route::post('saveForm','CertificationController@saveForm');

	Route::get('documentField/{phaseId}/{docId}','CertificationController@documentField');
	Route::post('saveFormField','CertificationController@saveFormField');

	Route::get('documentFieldOption/{phaseId}/{docId}/{optionId}','CertificationController@documentFieldOption');
	Route::post('saveOption','CertificationController@saveOption');
		//
	Route::post('saveFormValue','CertificationController@saveFormValue');
	
	Route::post('saveCertificationInit','CertificationController@saveCertificationInit');
	
	Route::post('saveNewDuration','CertificationController@saveNewDuration');

});

/*Action Entry */

Route::group(array('prefix'=>'surveillance','before'=>'auth'),function(){

	Route::get('main','SurveillanceController@main');

	Route::get('newActionEnrty','SurveillanceController@newActionEnrty');

	Route::get('newProgram','SurveillanceController@newProgram');

	Route::post('saveProgram','SurveillanceController@saveProgram');

	Route::post('updateProgram','SurveillanceController@updateProgram');

	//Route::get('programList/{from?}/{to?}','SurveillanceController@programList');

	Route::get('programList','SurveillanceController@programList');

	Route::get('programListDateToDate','SurveillanceController@programListDateToDate');

	Route::get('singleSurveillance','SurveillanceController@singleSurveillance');

	Route::post('saveAction','SurveillanceController@saveAction');

	Route::post('updateAction','SurveillanceController@updateAction');

	Route::post('saveSms','SurveillanceController@saveSms');
	Route::post('updateSms','SurveillanceController@updateSms');

	Route::get('surveillanceList','SurveillanceController@surveillanceList');

	Route::get('actionListDateToDate','SurveillanceController@actionListDateToDate');

	Route::get('todayTaskList','SurveillanceController@todayTaskList');

	Route::get('inspectionCheckList','SurveillanceController@inspectionCheckList');

	Route::get('checkList','SurveillanceController@checkList');

	Route::get('report','SurveillanceController@report');
	Route::get('reportChart/{fileName}/{active}','SurveillanceController@reportChart');

	Route::get('reportByDateToDate','SurveillanceController@reportByDateToDate');

	Route::get('singleProgram/{sia_number}','SurveillanceController@singleProgram');

	Route::get('correctiveAction/{sia_number}/{id?}','SurveillanceController@correctiveAction');
	//Route::get('correctiveAction/{sia_number}/{id}','SurveillanceController@correctiveAction');

	Route::get('followUp/{sia_number}','SurveillanceController@followUp');

	Route::post('saveFollowUp','SurveillanceController@saveFollowUp');

	Route::post('saveCorrectiveAction','SurveillanceController@saveCorrectiveAction');

	Route::post('updateCorrectiveAction','SurveillanceController@updateCorrectiveAction');

	Route::post('saveApprovalForm','SurveillanceController@saveApprovalForm');

	Route::post('updateApprovalForm','SurveillanceController@updateApprovalForm');

	Route::post('saveFinding','SurveillanceController@saveFinding');

	Route::post('updateFinding','SurveillanceController@updateFinding');

	Route::post('getChecklist','SurveillanceController@getChecklist');

	Route::get('getChecklist','SurveillanceController@getChecklistRecover');

	Route::post('saveChecklistAnswer','SurveillanceController@saveChecklistAnswer');

	Route::get('centralSearch','SurveillanceController@centralSearch');
	
	Route::get('mySia','SurveillanceController@mySia');	
	Route::get('mySiaListDateToDate','SurveillanceController@mySiaListDateToDate');

	Route::get('singleInspectorSia','SurveillanceController@singleInspectorSia');
	Route::get('singleInspectorSiaDateToDate','SurveillanceController@singleInspectorSiaDateToDate');
	
	Route::get('noticeBoard','SurveillanceController@noticeBoard');

	Route::get('allEdp','SurveillanceController@allEdp');

	//notification of sia

	Route::get('executionDateExceed','SurveillanceController@executionDateExceed');
	Route::get('findingTargetTimeExceed','SurveillanceController@findingTargetTimeExceed');
	Route::get('scTargetTimeExceed','SurveillanceController@scTargetTimeExceed');
	Route::get('scCorrPendingAproval','SurveillanceController@scCorrPendingAproval');
	Route::get('siaAprovalWaiting','SurveillanceController@siaAprovalWaiting');
	Route::get('scAprovalWaiting','SurveillanceController@scAprovalWaiting');
	Route::get('edpAprovalWaiting','SurveillanceController@edpAprovalWaiting');
	Route::get('edpPendingLegalOpinion','SurveillanceController@edpPendingLegalOpinion');
		//	20 Feb 2016
	Route::get('pendingSmsApproval','SurveillanceController@pendingSmsApproval');
	Route::get('pendingFindingCorrectiveActionList','SurveillanceController@pendingFindingCorrectiveActionList');



	

	

});
Route::get('reportChart/{fileName}/{active}','SurveillanceController@reportChart');

Route::group(array('prefix'=>'edp','before'=>'auth'),function(){

	Route::post('saveEdpPrimary','edpController@saveEdpPrimary');

	Route::post('updateEdpPrimary','edpController@updateEdpPrimary');

	

	Route::post('saveLegalOpinion','edpController@saveLegalOpinion');

	Route::post('updateLegalOpinion','edpController@updateLegalOpinion');

	

	Route::post('saveApproval','edpController@saveApproval');

	Route::post('updateApproval','edpController@updateApproval');

	Route::get('singleEdp/{edpNumber}','edpController@singleEdp');

	Route::get('edpList','edpController@edpList');

	});

Route::group(array('prefix'=>'admin','before'=>'auth'),function(){

	Route::get('main','AdminTrackingController@main');

	//entry Form

	Route::get('entry','AdminTrackingController@entry');

	//view list

	Route::get('issuedList','AdminTrackingController@issuedList');

	//delete

	Route::get('deleteAdmin/{id}',function($id){

			DB::table('admin_trackings')->where('id', '=', $id)->delete();

			return Redirect::to('admin/issuedList')->with('message', 'Successfully Deleted!!');

	});

	//save entry 

	Route::post('save','AdminTrackingController@save');

	Route::post('update','AdminTrackingController@update');

});

Route::group(array('prefix'=>'doc','before'=>'auth'),function(){

	

	Route::get('main','DocController@main');

	Route::get('entry','DocController@entry');

	Route::get('listView','DocController@listView');

	//entry 

	Route::post('save','DocController@save');

	//update

	Route::post('update','DocController@update');

	//delete

	Route::get('delete/{id}', function($id){

		DB::table('document_controllers')->where('id', '=', $id)->delete();

		return Redirect::to('doc/listView')->with('message', 'Successfully Deleted!!');

		

		});

	

	

});

Route::group(array('prefix'=>'pel','before'=>'auth'),function(){

	

	Route::get('main','PelController@main');



	Route::get('personalInfo','PelController@personalInfo');

	Route::post('savePersonalInfo','PelController@savePersonalInfo');

	Route::post('updatePesonalInfo','PelController@updatePesonalInfo');

	

	Route::get('accademicQali','PelController@accademicQali');

	Route::post('saveAccademic','PelController@saveAccademic');

	Route::post('updateAccademic','PelController@updateAccademic');

	Route::post('saveAccaThesis','PelController@saveAccaThesis');

	Route::post('updateAccaThesis','PelController@updateAccaThesis');



	Route::get('languageProficiency','PelController@languageProficiency');

	Route::post('saveLanguageProfeciency','PelController@saveLanguageProfeciency');

	Route::post('updateLanguageProfeciency','PelController@updateLanguageProfeciency');



	Route::get('designeeRecords','PelController@designeeRecords');

	Route::post('saveDesigneeRecord','PelController@saveDesigneeRecord');

	Route::post('updateDesigneeRecord','PelController@updateDesigneeRecord');



	Route::get('medicalCertificate','PelController@medicalCertificate');

	Route::post('saveMedicalCertification','PelController@saveMedicalCertification');

	Route::post('updateMedicalCertification','PelController@updateMedicalCertification');



	Route::get('licenseHistory','PelController@licenseHistory');

	Route::post('saveLicenseHistory','PelController@saveLicenseHistory');

	Route::post('updateLicenseHistory','PelController@updateLicenseHistory');

	

	Route::get('logbookReview','PelController@logbookReview');

	Route::post('saveLogbookReview','PelController@saveLogbookReview');

	Route::post('updateLogbookReview','PelController@updateLogbookReview');

	

	Route::get('licenseInfoMain','PelController@licenseInfoMain');



	Route::get('simulator','PelController@simulator');

	Route::post('saveSimulator','PelController@saveSimulator');

	Route::post('updateSimulator','PelController@updateSimulator');



	Route::get('general','PelController@general');

	Route::post('saveGeneral','PelController@saveGeneral');

	Route::post('updateGeneral','PelController@updateGeneral');



	Route::get('trainingDetails','PelController@trainingDetails');

	Route::post('saveTrainingDetails','PelController@saveTrainingDetails');

	Route::post('updateTrainingDetails','PelController@updateTrainingDetails');



	Route::get('ameLogDetails','PelController@ameLogDetails');

	Route::post('saveAmeDetails','PelController@saveAmeDetails');

	Route::post('updateAmeDetails','PelController@updateAmeDetails');



	Route::get('flyingDetails','PelController@flyingDetails');

	Route::post('saveFlyingDetails','PelController@saveFlyingDetails');

	Route::post('updateFlyingDetails','PelController@updateFlyingDetails');



	Route::get('atcLogDetails','PelController@atcLogDetails');



	Route::get('compView/{emp_id}','PelController@compView');

	Route::get('pelList','PelController@pelList');



	

	

	

	

	

});





Route::group(array('prefix'=>'usoap','before'=>'auth'),function(){

	Route::get('main','UsoapCmaController@main');

	Route::get('newPQ','UsoapCmaController@newPQ');

	Route::post('savePQ','UsoapCmaController@savePQ');

	Route::post('saveCC','UsoapCmaController@saveCC');

	Route::get('pqList','UsoapCmaController@pqList');





});

Route::group(array('prefix' => 'report','before'=>'auth'), function()
{
	//report
	Route::get('reportByModuel/{moduleName}','reportController@reportByModuel');
	Route::get('report','reportController@report');
	Route::get('reportChartByDateToDate','reportController@reportChartByDateToDate');
});

Route::get('surveillance/findingNumbers/{siaNum}',function(){
	$siaNum=Input::get('siaNum');
	if(Request::ajax()){
	//$select=array('--Select Finding Number--');
	 $data =DB::table('sia_findings')->where('sia_number','=',$siaNum) 
	                      ->lists('finding_number','id');
	 //$data=array_merge($select,$data);
	 return Response::json($data);
	}
	

});

Route::get('surveillance/scNumbers/{siaNum}/{findingNum}',function(){
	$siaNum=Input::get('siaNum');
	$findingNum=Input::get('findingNum');
	if(Request::ajax()){
	//$select=[{"safety_issue_number":"--Select SC number--"}];
	 $data =DB::table('sc_safety_concern')
	                      ->where('sia_number','=',$siaNum)
	                      ->where('finding_number','=',$findingNum)
	                      ->orderBy('safety_issue_number','desc')
	                      ->lists('safety_issue_number','id');
	//$data=array_merge($select,$data);
	 return Response::json($data);
	}
	

});


//Help And FAQ

Route::group(array('prefix'=>'helpFaq','before'=>'auth'),function(){
	Route::get('main','helpFaqController@main');
	Route::get('askQuestion','helpFaqController@askQuestion');
	Route::get('singleQuestionAnsware/{id}','helpFaqController@singleQuestionAnsware');
	
	Route::get('faqBank','helpFaqController@faqBank');
	Route::get('report','helpFaqController@report');

	Route::post('saveQuestion','helpFaqController@saveQuestion');
	Route::post('updateQuestion','helpFaqController@updateQuestion');

	Route::post('saveAnswre','helpFaqController@saveAnswre');
	Route::post('updateAnswre','helpFaqController@updateAnswre');
	});

//Voluntary Reporting

Route::group(array('prefix'=>'voluntary','before'=>'auth'),function(){
	Route::get('main','voluntaryReportingController@main');
	
	Route::get('voluntaryReportingList','voluntaryReportingController@voluntaryReportingList');
	Route::get('singleReport/{id}','voluntaryReportingController@singleReport');
	
	Route::post('saveAction','voluntaryReportingController@saveAction');
	Route::post('updateAction','voluntaryReportingController@updateAction');
	Route::post('saveApprovalForm','voluntaryReportingController@saveApprovalForm');
	Route::post('updateApprovalForm','voluntaryReportingController@updateApprovalForm');
	});
Route::post('voluntary/saveReport','voluntaryReportingController@saveReport');

//ITS OJT

Route::group(array('prefix'=>'itsOjt','before'=>'auth'),function(){
	Route::get('main','itsOjtController@main');
	Route::get('addCourse','itsOjtController@addCourse');
	Route::post('addFormalCourse','itsOjtController@addFormalCourse');
	Route::post('editFormalCourse/{id}','itsOjtController@editFormalCourse');
	Route::post('addOjtCourse','itsOjtController@addOjtCourse');
	Route::post('editOjtCourse/{id}','itsOjtController@editOjtCourse');

	Route::get('courseList','itsOjtController@courseList');
	Route::get('assignCourseAndOjt','itsOjtController@assignCourseAndOjt');
	Route::post('saveAssignCourseAndojt','itsOjtController@saveAssignCourseAndojt');

	Route::get('singleFormalCourse/{its_course_number}','itsOjtController@singleFormalCourse');
	Route::get('singleOjtCourse/{its_job_task_no}','itsOjtController@singleOjtCourse');


	Route::get('addTrainee','itsOjtController@addTrainee');
	Route::post('saveTrainee','itsOjtController@saveTrainee');
	Route::post('editTrainee','itsOjtController@editTrainee');
	
	Route::get('singleTrainee/{emp_tracker}','itsOjtController@singleTrainee');

	Route::get('addTrainingOjt','itsOjtController@addTrainingOjt');
	Route::get('individualTrainingOjt/{emp_tracker}','itsOjtController@individualTrainingOjt');

	Route::get('singleTrainingOjt/{course_num}/{emp_tracker}','itsOjtController@singleTrainingOjt');

	Route::post('updateFormalOjtStatus','itsOjtController@updateFormalOjtStatus');
	Route::post('editUpdateFormalOjtStatus','itsOjtController@editUpdateFormalOjtStatus');

	Route::get('traineeSingleOjtCourse/{course_num}/{ojt_no}/{emp_tracker}/{ojtd}','itsOjtController@trineeSingleOjtCourse');
	Route::get('traineeSingleFormalCourse/{course_num}/{emp_tracker}','itsOjtController@traineeSingleFormalCourse');

	
	Route::get('centralSearch','itsOjtController@centralSearch');

	Route::get('itsRecords','itsOjtController@itsRecords');
	// report
	Route::get('report','itsOjtController@report');
	Route::get('itsOjtRecordProvider','itsOjtController@itsOjtRecordProvider');
	
	});

//Metting router

Route::group(array('prefix'=>'meeting','before'=>'auth'),function(){
	Route::get('calendar','meetingController@calendar');
	
	});









