<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('name');
      $table->string('unit', 10);
      $table->smallInteger('gramm')->unsigned();
      $table->decimal('buyprice');
      $table->decimal('protein', 6, 2);
      $table->decimal('grease', 6, 2);
      $table->decimal('ch', 6, 2);
      $table->decimal('dry', 6, 2);
      $table->decimal('sugar', 6, 2);
      $table->decimal('fat', 6, 2);
      $table->decimal('salt', 6, 2);
      $table->boolean('state');
      $table->tinyInteger('product_type')->unsigned();
      $table->integer('category_id')->unsigned();
      $table->tinyInteger('alco')->unsigned();

      $table->decimal('vita', 6, 2);
      $table->decimal('vitb', 6, 2);
      $table->decimal('vitb1', 6, 2);
      $table->decimal('vitb2', 6, 2);
      $table->decimal('vitc', 6, 2);
      $table->decimal('vitd', 6, 2);
      $table->decimal('vite', 6, 2);
      $table->decimal('vitpp', 6, 2);
      $table->decimal('minca', 6, 2);
      $table->decimal('mink', 6, 2);
      $table->decimal('minmg', 6, 2);
      $table->decimal('minfe', 6, 2);
      $table->decimal('minna', 6, 2);
      $table->decimal('minp', 6, 2);

      $table->integer('code')->unsigned();

      $table->timestamps();
      $table->softDeletes();

      $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
