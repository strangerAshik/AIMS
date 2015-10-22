<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsoapPq extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usoap_pq', function($table){
			$table->increments('id');	
				
			$table->string('pq_number');
			$table->string('audit_area');
			$table->string('critical_element');
			$table->string('pq_type');
			$table->string('audit_area_group');
			$table->string('pq');
			$table->string('icao_ref');
			$table->string('review_evidence');
			$table->string('pq_overall_com_status');
			$table->string('number_of_cc');
			$table->string('final_statement');
			$table->string('final_evidence');
			$table->string('ncmc_approval');
			
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
		Schema::drop('usoap_pq');
	}

}
