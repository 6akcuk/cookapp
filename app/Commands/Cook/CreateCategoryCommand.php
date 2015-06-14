<?php namespace App\Commands\Cook;

use App\Commands\Command;

use App\Models\Cook\Category;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateCategoryCommand extends Command implements SelfHandling {

  /**
   * Название категории.
   *
   * @var
   */
  private $name;

  /**
   * Нормируемый показатель сухих веществ.
   *
   * @var
   */
  private $dry;

  /**
   * Нормируемый показатель жира.
   *
   * @var
   */
  private $grease;

  /**
   * Нормируемый показатель сахара.
   *
   * @var
   */
  private $sugar;

  /**
   * Нормируемый показатель соли.
   *
   * @var
   */
  private $salt;

  /**
   * Количество жира, открываемое в изделиях методом Гербера, %.
   *
   * @var
   */
  private $gerber;

  /**
   * КМА-ФАнМ КОЕ/г, не менее.
   *
   * @var
   */
  private $kma;

  /**
   * БГКП (колиформы).
   *
   * @var
   */
  private $bgkp;

  /**
   * E/coli
   *
   * @var
   */
  private $ecoli;

  /**
   * S.aureus
   *
   * @var
   */
  private $saureus;

  /**
   * Proteus
   *
   * @var
   */
  private $proteus;

  /**
   * Патогенные, в т.ч. сальмонеллы
   *
   * @var
   */
  private $patogen;

  /**
   * Родительская категория
   *
   * @var
   */
  private $parent_id;

  /**
   * Тип категории
   *
   * @var
   */
  private $product_type;

  /**
   * Коэффициент расчета минимального количества сухих веществ (см. cook.php config)
   *
   * @var
   */
  private $dry_koef;

  /**
   * Соль (максимально допустимое содержание, %)
   *
   * @var
   */
  private $salt_max;

  /**
   * @var
   */
  private $biosanpin;

  /**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($name, $dry = 0, $grease = 0, $sugar = 0, $salt = 0, $gerber = false, $kma = false,
    $bgkp = false, $ecoli = false, $saureus = false, $proteus = false, $patogen = false, $parent_id, $product_type,
    $dry_koef, $salt_max = false, $biosanpin = false
  )
	{
    $this->name = $name;
    $this->dry = $dry;
    $this->grease = $grease;
    $this->sugar = $sugar;
    $this->salt = $salt;
    $this->gerber = $gerber;
    $this->kma = $kma;
    $this->bgkp = $bgkp;
    $this->ecoli = $ecoli;
    $this->saureus = $saureus;
    $this->proteus = $proteus;
    $this->patogen = $patogen;
    $this->parent_id = $parent_id;
    $this->product_type = $product_type;
    $this->dry_koef = $dry_koef;
    $this->salt_max = $salt_max;
    $this->biosanpin = $biosanpin;
  }

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		return Category::create([
      'name' => $this->name,
      'dry' => $this->dry,
      'grease' => $this->grease,
      'sugar' => $this->sugar,
      'salt' => $this->salt,
      'gerber' => $this->gerber,
      'kma' => $this->kma,
      'bgkp' => $this->bgkp,
      'ecoli' => $this->ecoli,
      'saureus' => $this->saureus,
      'proteus' => $this->proteus,
      'patogen' => $this->patogen,
      'parent_id' => $this->parent_id,
      'product_type' => $this->product_type,
      'dry_koef' => $this->dry_koef,
      'salt_max' => $this->salt_max,
      'biosanpin' => $this->biosanpin
    ]);
	}

}
