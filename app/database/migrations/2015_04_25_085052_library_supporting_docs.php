<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LibrarySupportingDocs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lib_suporting_docs',function($table){
			$table->increments('id');
			$table->string('doc_title');
			$table->string('doc_authors');
			$table->string('doc_type');
			$table->string('doc_subject');
			$table->string('doc_tags');
			$table->string('doc_series');
			$table->string('doc_edition');
			$table->string('doc_part');
			$table->string('doc_volume');
			$table->string('doc_amendment');
			$table->string('doc_published_year');
			$table->string('doc_isbn');
			$table->string('doc_upload');
			$table->string('doc_url');
			$table->string('doc_status');
			
			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});	
		Schema::create('lib_suporting_docs_type',function($table){
			$table->increments('id');
			$table->string('doc_type');
						
			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('soft_delete');
			$table->timestamps();
			
		});
		Schema::create('lib_suporting_doc_authors',function($table){
			$table->increments('id');
			$table->string('doc_authors');						
			$table->string('doc_authors_name');
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
		Schema::drop('lib_suporting_docs');
		Schema::drop('lib_suporting_docs_type');
		Schema::drop('lib_suporting_doc_authors');
	}

}
