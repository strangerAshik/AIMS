<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualificationEduThesis extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification_edu_thesis',function($table){
		//education
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('level');
			$table->string('type');			
			$table->string('title');			
			$table->string('institute');
			$table->string('duration');
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
		Schema::drop('qualification_edu_thesis');
	}

}
