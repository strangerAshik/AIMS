<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualificationReference extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification_reference',function($table){
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('referee_type');
			$table->string('name');
			$table->string('designation');
			$table->string('address');
			$table->string('telephone');
			$table->string('years_acquainted');
			$table->string('email_address');
			$table->string('may_we_request');
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
		Schema::drop('qualification_reference');
	}

}
