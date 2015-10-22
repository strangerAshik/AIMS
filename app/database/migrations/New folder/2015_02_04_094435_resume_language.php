<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResumeLanguage extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_language',function($table){
			//language
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('mother_tounge');
			$table->string('lang');
			$table->string('lang_speak');
			$table->string('lang_understanding');
			$table->string('lang_reading');
			$table->string('lang_writing');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_language');
	}

}
