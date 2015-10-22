<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrgUpdateTracking extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('org_update_tracking',function($table){
						$table->increments('id');

						$table->string('table_name');
						$table->string('updater');
						$table->string('date_time');
						$table->string('org_number');
				
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
		Schema::drop('org_update_tracking');
	}

}
