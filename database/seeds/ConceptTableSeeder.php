<?php

use App\Models\Cook\Concept;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ConceptTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    Concept::create([
      'name' => 'Общий',
      'created_at' => '2015-05-14 11:52:49',
      'updated_at' => '2015-05-14 11:52:49'
    ]);
  }

}
