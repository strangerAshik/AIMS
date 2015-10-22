<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelLanguageProficiency extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_laguage_profeciancy',function($table){
			//language
			$table->increments('id');

			$table->string('emp_id');
			$table->string('mother_tounge');
			$table->string('language');
			$table->string('lang_speak');
			$table->string('lang_understanding');
			$table->string('lang_reading');
			$table->string('lang_writing');
			
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
		Schema::drop('pel_laguage_profeciancy');
	}

}
