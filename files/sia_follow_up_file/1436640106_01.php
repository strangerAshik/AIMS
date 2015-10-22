<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrganizationDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('org_primary',function($table){
			$table->increments('id');
			
			$table->string('org_number');
			$table->string('org_name');
			$table->string('active');

			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
		});

		Schema::create('org_business_name',function($table){
			$table->increments('id');			
			$table->string('org_number');
			$table->string('org_name');

			$table->string('active');
			$table->string('org_identifier');

			$table->string('org_business_name');
			$table->string('org_effective_date');
			$table->string('org_effective_month');
			$table->string('org_effective_year');
			$table->string('org_business_name_note');

			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
		});

		Schema::create('org_certificates',function($table){
			$table->increments('id');			
			$table->string('org_number');
			$table->string('org_name');

			$table->string('active');
			$table->string('org_identifier');
			
			$table->string('org_certificate_type');
			$table->string('org_issued_date');
			$table->string('org_issued_month');
			$table->string('org_issued_year');
			$table->string('org_expiration_date');
			$table->string('org_expiration_month');
			$table->string('org_expiration_year');
			$table->string('org_terminated_date');
			$table->string('org_terminated_month');
			$table->string('org_terminated_year');
			$table->string('org_control_number');
			$table->string('org_basis_note');
			

			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
		});

		Schema::create('org_base_location',function($table){
			$table->increments('id');			
			$table->string('org_number');
			$table->string('org_name');

			$table->string('active');
			$table->string('org_identifier');
			
			$table->string('org_certificate_type');
			$table->string('org_effective_date');
			$table->string('org_effective_month');
			$table->string('org_effective_year');
			$table->string('org_location_type');
			$table->string('contract_person');
			$table->string('org_telephone_number');
			$table->string('org_fax_number');
			$table->string('org_lecation');
			$table->string('org_address');
			$table->string('org_city');
			$table->string('org_state_province');
			$table->string('org_postal_code');
			$table->string('org_country');
			$table->string('memo_note');
			
			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
		});

		Schema::create('org_management_contacts',function($table){
			$table->increments('id');			
			$table->string('org_number');
			$table->string('org_name');

			$table->string('active');
			$table->string('org_identifier');
			
			
			$table->string('org_effective_date');
			$table->string('org_effective_month');
			$table->string('org_effective_year');

			$table->string('management_position');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('actual_title');
			
			$table->string('work_phone');
			$table->string('cell_number');
			$table->string('fax_number');
			$table->string('location');
			$table->string('email');
			$table->string('address');			
			$table->string('city');
			$table->string('state_province');
			$table->string('postal_code');
			$table->string('country');
			$table->string('control_number');
			$table->string('memo_note');
			
			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
		});
		Schema::create('org_caa_contacts',function($table){
					$table->increments('id');			
					$table->string('org_number');
					$table->string('org_name');

					$table->string('active');
					$table->string('org_identifier');
					
					
					$table->string('org_effective_date');
					$table->string('org_effective_month');
					$table->string('org_effective_year');

					$table->string('inspector_position');
					$table->string('first_name');
					$table->string('last_name');
					$table->string('actual_title');
					
					$table->string('work_phone');
					$table->string('cell_number');
					$table->string('fax_number');
					$table->string('location');
					$table->string('email');
					$table->string('address');			
					$table->string('city');
					$table->string('state_province');
					$table->string('postal_code');
					$table->string('country');
					$table->string('control_number');
					$table->string('basis_note');
					
					$table->string('row_creator');
					$table->string('row_updator');
					$table->integer('approve');
					$table->integer('warning');
					$table->integer('soft_delete');
					$table->timestamps();
		});

		Schema::create('org_exemptions_divinations',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('type');
						$table->string('assigned_number');
						$table->string('regulation');
						$table->string('control_number');
						$table->string('basis_note');
						
						
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_aircraft_listings',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('aircraft_mms');
						$table->string('registration_number');						
						$table->string('control_number');
						$table->string('rvsm');
						$table->string('parts_pool');
						$table->string('reliability');
						$table->string('lease_acceptable');
						$table->string('interchange');						
						$table->string('note');
						
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_policy_menual_approvals',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('type_of_approval');
						$table->string('revision_number');					
						$table->string('control_number');						
						$table->string('basis_note');
						
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_complexity_reviews',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						
						$table->string('org_review_date');
						$table->string('org_review_month');
						$table->string('org_review_year');

						$table->string('purpose_of_review');
						$table->string('total_employees');
						$table->string('total_flt_ops_employees');

						$table->string('total_pilots');
						$table->string('total_check_airmen');					
						$table->string('total_flight_attendants');						
						$table->string('total_aircraft_dispatchers');
						$table->string('flight_followers');
						$table->string('total_load_controllers');
						$table->string('total_maint_employees');
						$table->string('total_av_maint_technicians');
						$table->string('total_av_repair_specialists');
						$table->string('total_quality_assurance');
						$table->string('note');
						
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_aerial_work_approvals',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');


						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('type_of_approval');
						$table->string('revision_number');
						$table->string('aircraft_mms');
						$table->string('control_number');
						$table->string('method');

												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_non_certificated_operations',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');


						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('operations_type');
						$table->string('revision_number');
						$table->string('aircraft_mms');
						$table->string('limiting_factor');
						$table->string('control_number');
						$table->string('method');
						$table->string('basis_notes');

												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_flight_operation_Approvals',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');


						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('type_of_approval');
						$table->string('revision_number');
						
						$table->string('limiting_factor');
						$table->string('control_number');
						$table->string('method');
						$table->string('basis_notes');

												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_fleet_operation_approvals',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');


						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('type_of_approval');
						$table->string('revision_number');
						$table->string('limiting_factor');
						$table->string('aircraft_mms');	
						$table->string('control_number');
						$table->string('equipment');
						$table->string('method');
						$table->string('basis_note');

												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});			
		Schema::create('org_fleet_maintanance_approvals',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');


						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('type_of_approval');
						$table->string('revision_number');
						$table->string('limiting_factor');
						$table->string('aircraft_mms');
						$table->string('control_number');
						$table->string('equipment');
						$table->string('method');
						$table->string('basis_note');

												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_airport_auth',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');


						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('location');
						$table->string('type_of_approval');
						$table->string('revision_number');
						$table->string('limiting_factor');
						$table->string('aircraft_mms');
						$table->string('control_number');
						$table->string('note');
						

												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_leasing_arrangment',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('arrangement');						
						$table->string('revision_number');
						$table->string('other');						
						$table->string('control_number');
						$table->string('notes');	
												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});

		Schema::create('org_contracted_services',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('issued_date');
						$table->string('issued_month');
						$table->string('issued_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('type_of_approval');						
						$table->string('revision_number');
						$table->string('aircraft_mms');						
						$table->string('limiting_factor');						
						$table->string('control_number');
						$table->string('basis_note');	
												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});

		Schema::create('org_amo_approvals',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('category_rating');						
						$table->string('class_rating');
						$table->string('rating_description');						
						$table->string('revision_number');						
						$table->string('contractor');
						$table->string('control_number');	
						$table->string('specific_equipment');	
						$table->string('available_method');	
												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});

		Schema::create('org_ato_approvals',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('ato_category');						
						$table->string('ato_curriculums');
						$table->string('revision_number');						
						$table->string('control_number');						
						$table->string('approved_training_equipment');
						$table->string('approved_method');	
												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});

		Schema::create('org_aoc_approvals_areas',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('approved_areas_of_operation');						
						$table->string('revision_number');						
						$table->string('control_number');						
						$table->string('aircraft_authorized');
						$table->string('special_authorizations');	
						$table->string('limitations');	
												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_aoc_approval_routes',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('origination_city');						
						$table->string('destination_city');						
						$table->string('revision_number');						
						$table->string('control_number');
						$table->string('special_route');	
						$table->string('operational_limitations');	
												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_aoc_maintenance_arrangement',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('type_of_approval');						
						$table->string('location');						
						$table->string('service_provider');						
						$table->string('control_number');
						$table->string('applicable_aircraft');	
						$table->string('specific_authorizations');	
												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
		Schema::create('org_aoc_training_arrangement',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('org_terminated_date');
						$table->string('org_terminated_month');
						$table->string('org_terminated_year');

						$table->string('type_of_approval');						
						$table->string('location');						
						$table->string('service_provider');						
						$table->string('control_number');
						$table->string('authorized_training');							
												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});

		Schema::create('org_approval_simulators',function($table){
						$table->increments('id');			
						$table->string('org_number');
						$table->string('org_name');

						$table->string('active');
						$table->string('org_identifier');
						
						$table->string('org_effective_date');
						$table->string('org_effective_month');
						$table->string('org_effective_year');

						$table->string('aircraft_mms');						
						$table->string('assigned_level');						
						$table->string('location');						
						$table->string('simulator_number');
						$table->string('simulator_provider');							
						$table->string('simulator_provider');							
						$table->string('control_number');							
						$table->string('authorized_purpose');							
												
						$table->string('row_creator');
						$table->string('row_updator');
						$table->integer('approve');
						$table->integer('warning');
						$table->integer('soft_delete');
						$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('org_primary');
		Schema::drop('org_business_name');
		Schema::drop('org_certificates');
		Schema::drop('org_base_location');
		Schema::drop('org_management_contacts');
		Schema::drop('org_caa_contacts');
		Schema::drop('org_exemptions_divinations');
		Schema::drop('org_aircraft_listings');
		Schema::drop('org_policy_menual_approvals');
		Schema::drop('org_complexity_reviews');
		Schema::drop('org_aerial_work_approvals');
		Schema::drop('org_non_certificated_operations');
		Schema::drop('org_flight_operation_Approvals');
		Schema::drop('org_fleet_operation_approvals');
		Schema::drop('org_fleet_maintanance_approvals');
		Schema::drop('org_airport_auth');
		Schema::drop('org_leasing_arrangment');
		Schema::drop('org_contracted_services');
		Schema::drop('org_amo_approvals');
		Schema::drop('org_ato_approvals');
		Schema::drop('org_aoc_approvals_areas');
		Schema::drop('org_aoc_approval_routes');
		Schema::drop('org_aoc_maintenance_arrangement');
		Schema::drop('org_aoc_training_arrangement');
		Schema::drop('org_approval_simulators');
	}

}
