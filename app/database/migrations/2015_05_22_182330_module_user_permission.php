<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModuleUserPermission extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('module_user_permission',function($table){
			
			$table->increments('id');
			
			$table->string('user_id');
			$table->string('module_name');
			$table->string('access');
			$table->string('entry');
			$table->string('update');
			$table->string('approve');
			$table->string('worning');
			$table->string('sof_delete');
			$table->string('par_delete');
			$table->string('report');

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
		Schema::drop('module_user_permission');
	}

}
