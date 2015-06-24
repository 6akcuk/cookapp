<?php namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;

class NomenclatureController extends Controller {

  public function index() {
    return view('cook.layouts.nomenclature');
  }
}