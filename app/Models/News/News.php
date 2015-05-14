<?php namespace App\Models\News;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model {

  use SoftDeletes;

	//
  protected $fillable = ['city_id', 'author_id', 'title', 'content', 'fixed', 'published_at'];

  protected $dates = ['published_at'];

  public function scopePublished($query) {
    return $query->where('published_at', '<=', Carbon::now());
  }

  public function scopeDraft($query) {
    return $query->where('draft', true);
  }

  public function scopeCleanCopy($query) {
    return $query->where('draft', false);
  }

  /**
   * Получить информацию о городе, в котором написана новость.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function city() {
    return $this->belongsTo('App\Models\Geography\City');
  }

  /**
   * Получить информацию об авторе новости.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function author() {
    return $this->belongsTo('App\Models\User');
  }
}
