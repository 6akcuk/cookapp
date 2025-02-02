<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('CategoryTableSeeder');
    $this->call('ProductTableSeeder');
    $this->call('OrganizationTableSeeder');
    $this->call('ConceptTableSeeder');
    $this->call('ProcessTableSeeder');
    $this->call('RecipeTableSeeder');
    $this->call('RecipeDetailTableSeeder');
  }

}
