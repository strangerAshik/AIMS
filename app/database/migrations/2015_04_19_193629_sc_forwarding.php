<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScForwarding extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sc_forwarding',function($table){
			$table->increments('id');
			$table->string('safety_issue_number');
			
			$table->string('forwarding_to');
			$table->string('designation');
			$table->string('forwarding_note',600);			
			$table->string('forwarding_date');			
			
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
		Schema::drop('sc_forwarding');
	}

}
