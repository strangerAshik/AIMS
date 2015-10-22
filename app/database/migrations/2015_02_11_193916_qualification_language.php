<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualificationLanguage extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification_language',function($table){
			//language
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('mother_tounge');
			$table->string('language');
			$table->string('lang_speak');
			$table->string('lang_understanding');
			$table->string('lang_reading');
			$table->string('lang_writing');
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
		Schema::drop('qualification_language');
	}

}
