<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrgDocumentList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('org_document_list',function($table){
			$table->increments('id');			
			$table->string('org_number');
			$table->string('org_name');

			$table->string('active');
			$table->string('title');
			$table->string('effective_date');
			$table->string('category');
			$table->string('file_name');
			$table->string('renewal_date');
			$table->string('doc_note');
			
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
		Schema::drop('org_document_list');
	}

}
