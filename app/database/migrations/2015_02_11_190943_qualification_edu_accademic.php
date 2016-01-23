<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualificationEduAccademic extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification_edu_accademic',function($table){
		//education
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('level');
			$table->string('name_of_degree');
			$table->string('discipline');
			$table->string('specialization');			
			$table->string('institute');
			$table->string('pussing_year');
			$table->string('standard');
			$table->string('grade_division');
			$table->string('out_of');
			$table->string('certificate');
			$table->string('verify',10);
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
		Schema::drop('qualification_edu_accademic');
	}

}
