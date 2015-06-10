<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipedetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipe_details', function(Blueprint $table)
		{
			$table->increments('id');
      $table->integer('recipe_id')->unsigned();
      $table->integer('product_id')->unsigned();
      $table->integer('process_id')->unsigned();
      $table->smallInteger('brutto')->unsigned();
      $table->smallInteger('netto')->unsigned();
      $table->boolean('nettoflag');
      $table->smallInteger('total')->unsigned();
      $table->boolean('totalflag');
      $table->integer('ordernumber')->unsigned();
      $table->boolean('semiflag');

      $table->foreign('recipe_id')
            ->references('id')->on('recipes')
            ->onDelete('cascade');

      $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');

      $table->foreign('process_id')
            ->references('id')->on('processes')
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
		Schema::drop('recipe_details');
	}

}
