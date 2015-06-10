<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processes', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('name');
      $table->integer('product_id')->unsigned();
      $table->tinyInteger('coldproc')->unsigned();
      $table->tinyInteger('hotproc')->unsigned();
      $table->tinyInteger('finalproc')->unsigned();
      $table->tinyInteger('protein')->unsigned();
      $table->tinyInteger('grease')->unsigned();
      $table->tinyInteger('ch')->unsigned();
      $table->boolean('is_default');

      $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');

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
		Schema::drop('processes');
	}

}
