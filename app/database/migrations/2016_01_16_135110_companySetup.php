<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanySetup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_setup',function($table){
			$table->increments('id');

			$table->string('short_name');
			$table->string('full_name');
			$table->string('support_email');
			$table->string('about',10000);
			$table->string('address',1000);

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
		Schema::drop('company_setup');
	}

}
