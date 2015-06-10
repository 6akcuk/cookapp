<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('name');
      $table->boolean('dry');
      $table->boolean('grease');
      $table->boolean('sugar');
      $table->boolean('salt');
      $table->smallInteger('gerber')->unsigned();
      $table->string('kma');
      $table->string('bgkp', 20);
      $table->string('ecoli', 20);
      $table->string('saureus', 20);
      $table->string('proteus', 20);
      $table->string('patogen', 20);
      $table->integer('parent_id')->unsigned();
      $table->tinyInteger('product_type')->unsigned();
      $table->decimal('dry_koef', 6, 4);
      $table->tinyInteger('salt_max')->unsigned();
      $table->string('biosanpin', 15);
      $table->integer('code')->unsigned();

			$table->timestamps();
      $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
