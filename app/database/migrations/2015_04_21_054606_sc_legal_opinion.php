<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScLegalOpinion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sc_legal_openion',function($table){
			$table->increments('id');			
			$table->string('safety_issue_number');
			
			$table->string('legal_openion',700);
			
			$table->string('row_creator');
			$table->string('creator_emp_id');
			$table->string('row_updator');
			$table->string('updater_emp_id');
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
		Schema::drop('sc_legal_openion');
	}

}
