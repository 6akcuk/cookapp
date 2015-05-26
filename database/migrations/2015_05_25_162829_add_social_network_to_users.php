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
			$table->string('social_network', 30)->after('remember_token');
      $table->integer('social_id')->nullable()->unsigned()->after('social_network');
      $table->text('photo')->after('social_id');
      $table->integer('city_id')->nullable()->unsigned()->after('photo');

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
