<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function(Blueprint $table)
		{
			$table->increments('id');
      $table->timestamp('recipe_at');
      $table->tinyInteger('number')->unsigned();
      $table->smallInteger('total')->unsigned();
      $table->boolean('is_default');
      $table->integer('organization_id')->unsigned();
      $table->integer('product_id')->unsigned();
      $table->decimal('price');
      $table->string('product_total', 50);
      $table->tinyInteger('parts')->unsigned();
      $table->integer('concept_id')->unsigned();

      $table->foreign('organization_id')
            ->references('id')->on('organizations')
            ->onDelete('cascade');

      $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');

      $table->foreign('concept_id')
            ->references('id')->on('concepts')
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
		Schema::drop('recipes');
	}

}
