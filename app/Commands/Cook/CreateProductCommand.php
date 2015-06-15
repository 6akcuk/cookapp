<?php namespace App\Commands\Cook;

use App\Commands\Command;

use App\Models\Cook\Category;
use App\Models\Cook\Product;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateProductCommand extends Command implements SelfHandling {

  /**
   * @var
   */
  private $name;
  /**
   * @var
   */
  private $category_id;
  /**
   * @var
   */
  private $product_type;
  /**
   * @var
   */
  private $unit;
  /**
   * @var int
   */
  private $gramm;
  /**
   * @var int
   */
  private $protein;
  /**
   * @var int
   */
  private $grease;
  /**
   * @var int
   */
  private $ch;
  /**
   * @var int
   */
  private $dry;
  /**
   * @var int
   */
  private $sugar;
  /**
   * @var int
   */
  private $fat;
  /**
   * @var int
   */
  private $alco;
  /**
   * @var int
   */
  private $vita;
  /**
   * @var int
   */
  private $vitb;
  /**
   * @var int
   */
  private $vitb1;
  /**
   * @var int
   */
  private $vitb2;
  /**
   * @var int
   */
  private $vitc;
  /**
   * @var int
   */
  private $vitd;
  /**
   * @var int
   */
  private $vite;
  /**
   * @var int
   */
  private $vitpp;
  /**
   * @var int
   */
  private $minca;
  /**
   * @var int
   */
  private $mink;
  /**
   * @var int
   */
  private $minmg;
  /**
   * @var int
   */
  private $minfe;
  /**
   * @var int
   */
  private $minna;
  /**
   * @var int
   */
  private $minp;

  /**
   * Create a new command instance.
   *
   * @param $name
   * @param $category_id
   * @param $product_type
   * @param $unit
   * @param int $gramm
   * @param int $protein
   * @param int $grease
   * @param int $ch
   * @param int $dry
   * @param int $sugar
   * @param int $fat
   * @param int $alco
   * @param int $vita
   * @param int $vitb
   * @param int $vitb1
   * @param int $vitb2
   * @param int $vitc
   * @param int $vitd
   * @param int $vite
   * @param int $vitpp
   * @param int $minca
   * @param int $mink
   * @param int $minmg
   * @param int $minfe
   * @param int $minna
   * @param int $minp
   */
  public function __construct($name, $category_id, $product_type, $unit, $gramm = 0, $protein = 0, $grease = 0, $ch = 0,
    $dry = 0, $sugar = 0, $fat = 0, $alco = 0, $vita = 0, $vitb = 0, $vitb1 = 0, $vitb2 = 0, $vitc = 0, $vitd = 0,
    $vite = 0, $vitpp = 0, $minca = 0, $mink = 0, $minmg = 0, $minfe = 0, $minna = 0, $minp = 0
  )
  {
    $this->name = $name;
    $this->category_id = $category_id;
    $this->product_type = $product_type;
    $this->unit = $unit;
    $this->gramm = $gramm;
    $this->protein = $protein;
    $this->grease = $grease;
    $this->ch = $ch;
    $this->dry = $dry;
    $this->sugar = $sugar;
    $this->fat = $fat;
    $this->alco = $alco;
    $this->vita = $vita;
    $this->vitb = $vitb;
    $this->vitb1 = $vitb1;
    $this->vitb2 = $vitb2;
    $this->vitc = $vitc;
    $this->vitd = $vitd;
    $this->vite = $vite;
    $this->vitpp = $vitpp;
    $this->minca = $minca;
    $this->mink = $mink;
    $this->minmg = $minmg;
    $this->minfe = $minfe;
    $this->minna = $minna;
    $this->minp = $minp;
  }

  /**
   * Execute the command.
   *
   * @return void
   */
  public function handle()
  {
    return Product::create([
      'name' => $this->name,
      'category_id' => $this->category_id,
      'product_type' => $this->product_type,
      'unit' => $this->unit,
      'gramm' => $this->gramm,
      'protein' => $this->protein,
      'grease' => $this->grease,
      'ch' => $this->ch,
      'dry' => $this->dry,
      'sugar' => $this->sugar,
      'fat' => $this->fat,
      'alco' => $this->alco,
      'vita' => $this->vita,
      'vitb' => $this->vitb,
      'vitb1' => $this->vitb1,
      'vitb2' => $this->vitb2,
      'vitc' => $this->vitc,
      'vitd' => $this->vitd,
      'vite' => $this->vite,
      'vitpp' => $this->vitpp,
      'minca' => $this->minca,
      'mink' => $this->mink,
      'minmg' => $this->minmg,
      'minfe' => $this->minfe,
      'minna' => $this->minna,
      'minp' => $this->minp
    ]);
  }

}
