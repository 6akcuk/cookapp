<?php

use App\Models\Cook\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OrganizationTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    Organization::create([
      'name' => '- Наименование организации -'
    ]);
  }

}
