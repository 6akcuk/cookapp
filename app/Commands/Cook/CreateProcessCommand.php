<?php namespace App\Commands\Cook;

use App\Commands\Command;

use App\Models\Cook\Process;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateProcessCommand extends Command implements SelfHandling {
  /**
   * @var
   */
  private $name;
  /**
   * @var
   */
  private $product_id;
  /**
   * @var int
   */
  private $coldproc;
  /**
   * @var int
   */
  private $hotproc;
  /**
   * @var int
   */
  private $finalproc;
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
   * @var bool
   */
  private $is_default;

  /**
   * @param $name
   * @param $product_id
   * @param int $coldproc
   * @param int $hotproc
   * @param int $finalproc
   * @param int $protein
   * @param int $grease
   * @param int $ch
   * @param bool $is_default
   */
  public function __construct($name, $product_id, $coldproc = 0, $hotproc = 0, $finalproc = 0, $protein = 0, $grease = 0,
    $ch = 0, $is_default = false)
  {
    $this->name = $name;
    $this->product_id = $product_id;
    $this->coldproc = $coldproc;
    $this->hotproc = $hotproc;
    $this->finalproc = $finalproc;
    $this->protein = $protein;
    $this->grease = $grease;
    $this->ch = $ch;
    $this->is_default = $is_default;
  }

  public function handle() {
    return Process::create([
      'name' => $this->name,
      'product_id' => $this->product_id,
      'coldproc' => $this->coldproc,
      'hotproc' => $this->hotproc,
      'finalproc' => $this->finalproc,
      'protein' => $this->protein,
      'grease' => $this->grease,
      'ch' => $this->ch,
      'is_default' => $this->is_default
    ]);
  }
}