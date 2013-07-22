<?php

use Illuminate\Database\Migrations\Migration;

class CreateExampleMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('example_object', function($table)
		{
			$table->increments('id');//10 bytes, use bigIncrements for larger possible integer values, 20 bytes, automatically primary key

			$table->string('example_string', 255);//second parameter is length in characters/bytes, default 255
			$table->text('example_text');//for large amounts of text

			$table->integer('example_integer');//11 bytes
			$table->bigInteger('example_big_integer');//20 bytes
			$table->mediumInteger('example_medium_integer');//9 bytes
			$table->smallInteger('example_small_integer');//6 bytes
			$table->tinyInteger('example_tiny_integer');//1 byte

			$table->float('example_float', 8, 2);//second and third parameters are length and decimal places respectively, default 8 and 2
			$table->decimal('example_decimal');//same optional parameters as float, difference from float is Fixed-Precision

			$table->binary('example_binary');//binary data like what is stored in a binary file

			$table->boolean('example_boolean');//1 byte int

			$possible_enum_values = array('first posible value', 'SecondPosibleValue', 'third_possible_value');
		    $table->enum('example_enum', $possible_enum_values);

		    $table->date('example_date');
		    $table->dateTime('example_date_time');
		    $table->time('example_time');
		    $table->timestamp('example_timestamp');

			$table->timestamps();//adds created_at and updated_at timestamps, auto-updates
			$table->softDeletes();//adds deleted_at timestamp, default null, auto-updates

			/*-----Column Modifiers--------
			unique()
			primary()//make the primary key, or add to list of columns in primary key, can take an array of column names as parameter
			index()//can take an arry of column names as parameter
			nullable()// undo with nullable(false)
			default('default_value')
			unsigned()

			ex.

			$table->string('example_string')->unique();//can chain on multiple modifiers

			or

			$table->string('example_string');
			$table->unique('example_string');


			*/

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('example_object');//also can use dropIfExists('example_object')
		/*------Other drops------
		Schema::table('example_object', function($table)
		{
			$table->dropColumn('column_name');
			$table->dropPrimary('column_name');
			$table->dropUnique('column_name');
			$table->dropIndex('column_name');
		});
		*/
	}

}