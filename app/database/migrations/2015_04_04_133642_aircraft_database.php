<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AircraftDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aircraft_primary_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('assigned_inspector');
			
			$table->string('serial_number');
			$table->string('state_registration');
			$table->string('registration_no');
			$table->string('aircraft_operator');
			$table->string('active');
			$table->string('registration');
			$table->string('cofa');
			$table->string('stcs');
			$table->string('current_exemptions');
			$table->string('insurance');
			$table->string('currently_leased');
			$table->string('memo');			
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_tc_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('tc_number');
			$table->string('tc_state_of_registration');
			
			$table->string('tc_type_approval_date');

			$table->string('tc_validation_date');
			$table->string('tc_validation_month');
			$table->string('tc_validation_year');
			
			$table->string('tc_type_acceptance_date');

			$table->string('tc_control_number');
			$table->string('tc_AFM_approval_date');
			$table->string('tc_AFM_approval_month');
			$table->string('tc_AFM_approval_year');
			$table->string('tc_AFM_revision');
			$table->string('tc_state_of_design');

			$table->string('tc_state_of_manufacturing');

			$table->string('tc_power_plant_model');
			$table->string('tc_power_plant_tds_number');
			$table->string('tc_propeller_model');
			$table->string('tc_propeller_tds_number');
			
			$table->string('tcds_no');
			$table->string('tcds_revision_date');
			$table->string('tcds_revision_no');
			$table->string('tdcs_link');

			$table->string('tc_upload');
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_stc_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('stc_number');
			$table->string('stc_validation_date');
			$table->string('stc_validation_month');
			$table->string('stc_validation_year');
			$table->string('stc_control_number');
			$table->string('stc_afm_revision');
			$table->string('stc_state_of_design');
			$table->string('stc_SOD_notified');
			$table->string('stc_AFM_revision_number');
			$table->string('stc_AFM_approval_date');
			$table->string('stc_AFM_approval_month');
			$table->string('stc_AFM_approval_year');
			$table->string('stc_purpose');

			$table->string('stc_upload');
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_exemption_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('exemption_number');
			$table->string('regulation');
			$table->string('effective_date');
			$table->string('effective_month');
			$table->string('effective_year');
			$table->string('exemption_control_number');
			$table->string('basis');

			$table->string('exemption_upload');
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_registration_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('registration_number');
			$table->string('reg_effective_date');
			$table->string('reg_effective_month');
			$table->string('reg_effective_year');
			$table->string('state_of_registration');
			$table->string('activation_control_number');
			$table->string('reg_expiration_date');
			$table->string('reg_expiration_month');
			$table->string('reg_expiration_year');
			$table->string('registry_number');
			$table->string('de_registration_date');
			$table->string('de_registration_month');
			$table->string('de_registration_year');
			$table->string('de_regisration_control_number');
			$table->string('de_regisration_basis');
			$table->string('previous_state_registration');
			$table->string('reg_status_memo');

			$table->string('registration_upload');
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_airworthiness_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('ac_effective_date');
			$table->string('ac_effective_month');
			$table->string('ac_effective_year');
			$table->string('ac_cofa_type');
			$table->string('ac_category');
			$table->string('ac_activation_control_number');
			$table->string('c_of_a_number');
			$table->string('ac_expiration_date');
			$table->string('ac_expiration_month');
			$table->string('ac_expiration_year');
			$table->string('max_gross_take_off_weight');
			$table->string('max_pax_seating_capacity');
			$table->string('mode_s_code');
			$table->string('ac_deactivation_date');
			$table->string('ac_deactivation_month');
			$table->string('ac_deactivation_year');
			$table->string('ac_deactivation_basis');
			$table->string('ac_deactivation_control_number');
			$table->string('system_of_airwothiness');
			$table->string('ac_status_memo');
			$table->string('ac_exemption');

			$table->string('ac_upload');
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_caa_approval_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('type_of_approval');
			$table->string('approval_effective_date');
			$table->string('approval_effective_month');
			$table->string('approval_effective_year');
			$table->string('approval_control_number');
			$table->string('rescinded_date');
			$table->string('rescinded_month');
			$table->string('rescinded_year');
			$table->string('rescinded_control_number');
			$table->string('limiting_factor');
			$table->string('terms_of_approval_memo');

			$table->string('approval_upload');
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_owner_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('owner_name');
			$table->string('owner_effective_date');
			$table->string('owner_effective_month');
			$table->string('owner_effective_year');
			$table->string('owner_address1');
			$table->string('owner_address2');
			$table->string('owner_phone');
			$table->string('owner_fax');
			$table->string('owner_email');
			$table->string('owner_city');
			$table->string('owner_state_or_province');
			$table->string('owner_postal_code');
			$table->string('owner_country');
			$table->string('owner_lessor');

			$table->string('owner_upload');
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_lessee_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('lessee');
			$table->string('lessee_effective_date');
			$table->string('lessee_effective_month');
			$table->string('lessee_effective_year');
			$table->string('lessee_address1');
			$table->string('lessee_address2');
			$table->string('lessee_phone');
			$table->string('lessee_fax');
			$table->string('lessee_email');
			$table->string('lessee_city');
			$table->string('lessee_state_or_province');
			$table->string('lessee_postal_code');
			$table->string('lessee_country');

			$table->string('lesse_upload');
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_insurer_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('insurer_name');
			$table->string('name_insured');
			$table->string('insurer_address1');
			$table->string('insurer_address2');
			$table->string('insurer_phone');
			$table->string('insurer_fax');
			$table->string('insurer_email');
			$table->string('insurer_city');
			$table->string('insurer_state_or_province');
			$table->string('insurer_postal_code');
			$table->string('insurer_country');
			$table->string('insurer_liability_amount');
			$table->string('insurer_effective_date');
			$table->string('insurer_effective_month');
			$table->string('insurer_effective_year');
			$table->string('insurer_expiration_date');
			$table->string('insurer_expiration_month');
			$table->string('insurer_expiration_year');

			$table->string('insurer_upload');
			
			$table->integer('approve');
			$table->integer('warning');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('aircraft_equipment_review_info',function($table){
			$table->increments('id');
			$table->string('aircraft_MM');
			$table->string('aircraft_MSN');
			
			$table->string('review_date');
			$table->string('review_month');
			$table->string('review_year');
			$table->string('review_active');
			$table->string('purpose_of_review');
			$table->string('location');
			$table->string('airframe_hours');
			$table->string('engine1_hours');
			$table->string('engine2_hours');
			$table->string('engine1_TSO');
			$table->string('engine2_TSO');
			$table->string('engine1_MMS');
			$table->string('engine2_MMS');
			$table->string('prop_rotor1_MMS');
			$table->string('prop_rotor2_MMS');
			$table->string('governor1_MMS');
			$table->string('governor2_MMS');
			$table->string('nav1_MMS');
			$table->string('nav2_MMS');
			$table->string('gps_mm');
			$table->string('adf_mm');
			$table->string('ils_mm');
			$table->string('vnav_mm');
			$table->string('comm1_mm');
			$table->string('comm2_mm');
			$table->string('lr_comm_mm');
			$table->string('tcas_mm');
			$table->string('transponder_mm');
			$table->string('transponder_mode');
			$table->string('fdr_mm');
			$table->string('fdr_mode');
			$table->string('fdr_pinger_type');
			$table->string('cvr_mm');
			$table->string('elt_mm');
			$table->string('note');
			
			$table->string('equip_upload');
			
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
		Schema::drop('aircraft_primary_info');
		Schema::drop('aircraft_tc_info');
		Schema::drop('aircraft_stc_info');
		Schema::drop('aircraft_exemption_info');
		Schema::drop('aircraft_registration_info');
		Schema::drop('aircraft_airworthiness_info');
		Schema::drop('aircraft_caa_approval_info');
		Schema::drop('aircraft_owner_info');
		Schema::drop('aircraft_lessee_info');
		Schema::drop('aircraft_insurer_info');
		Schema::drop('aircraft_equipment_review_info');
	}

}
