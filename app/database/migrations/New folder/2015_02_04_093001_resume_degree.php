<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResumeDegree extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_dgree',function($table){
			//Thesis/Project/Internship/Dissertation 
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('dgree_level');
			$table->string('dgree_type');
			$table->string('dgree_title');
			$table->string('dgree_institute');
			$table->string('dgree_duration');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_dgree');
	}

}
