<?php namespace App\Commands\Cook;

use App\Commands\Command;

use App\Models\Cook\Process;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateProcessCommand extends Command implements SelfHandling {

  /**
   * @var
   */
  private $id;
  /**
   * @var
   */
  private $name;
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
   * @param $id
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
  public function __construct($id, $name, $coldproc = 0, $hotproc = 0, $finalproc = 0, $protein = 0, $grease = 0,
                              $ch = 0, $is_default = false)
  {
    $this->id = $id;
    $this->name = $name;
    $this->coldproc = $coldproc;
    $this->hotproc = $hotproc;
    $this->finalproc = $finalproc;
    $this->protein = $protein;
    $this->grease = $grease;
    $this->ch = $ch;
    $this->is_default = $is_default;
  }

  public function handle() {
    $process = Process::findOrFail($this->id);
    $process->update([
      'name' => $this->name,
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