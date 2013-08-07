<?php

use Illuminate\Database\Migrations\Migration;

class ExOneToOne extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('smaller_example_objects', function($table)
		{		
			$table->integer('ex_object_id')->unsigned();
			$table->foreign('ex_object_id')->references('id')->on('ex_objects');
		});			
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('smaller_example_objects',function($table)
		{
			$table->dropForeign('ex_object_id');
			$table->drop('ex_object_id');
		});
	}
}