<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsoapCc extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usoap_cc',function($table){
			$table->increments('id');	
				
			$table->string('pq_number');
			$table->string('status');
			$table->string('state_ref');
			$table->string('details_of_difference');
			$table->string('remarks');
			$table->string('date_of_complementation');			
			$table->string('complementation_by_percent');

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
		Schema::drop('usoap_cc');
	}

}
