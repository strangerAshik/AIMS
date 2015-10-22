<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelAMELogDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_ame_log_details',function($table){
			$table->increments('id');
			$table->string('emp_id');

			$table->string('index_number');
			$table->string('ata_chapter');
			$table->string('part_66_module');
			$table->string('task_competence_group_p_66');
			$table->string('task_competence_details_p_66');
			$table->string('basic_skill_title');
			$table->string('basic_skill_task');
			$table->string('maintenance_task_title');
			$table->string('maintenance_task_details');
			$table->string('aircraft_msn');
			$table->string('workshop');
			$table->string('work_order');
			$table->string('supervisor_instructor_assessor_company');

			$table->string('date');			
			$table->string('month');
			$table->string('year');
			
			$table->string('hour_details');	
			
			$table->string('approve',10);
			$table->string('warning',10);
			$table->string('row_creator');
			$table->string('row_updator');
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
		Schema::drop('pel_ame_log_details');
	}

}
