<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialNetworkToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('social_network', 30);
      $table->integer('social_id', false, true);
      $table->text('photo');
      $table->integer('city_id', false, true);

      $table->foreign('city_id')
            ->references('id')->on('cities')
            ->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn(['social_network', 'social_id', 'photo', 'city_id']);
		});
	}

}
