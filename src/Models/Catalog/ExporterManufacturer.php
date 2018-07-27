<?php

namespace Sigurd\mod_exporter_manufacturers\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ExporterManufacturer extends Model
{

  /**
   * Název tabulky výrobců
   *
   * @var string
   */

  protected $table = 'ls_manufacturers';

  use Notifiable;

  /**
   * Dostupné sloupce tabulky výrobců
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'active',
    'position',
  ];


  /**
   * Sloupce tabulky výrobců
   *
   * @var array
   */
  protected $dates = [
    'created_at',
    'updated_at',
  ];



  public function export()
  {
      return $this->hasMany('App\Models\Catalog\Manufacturer', 'manufacturer_id', 'id');
  }
}
