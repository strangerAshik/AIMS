<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropDownManagement extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dropdown_option_management',function($table){
			$table->increments('id');

			$table->string('dropdown_names');
			$table->string('core_module_names');
			$table->string('options');
			
			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('soft_delete');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('dropdown_option_management');
	}

}
