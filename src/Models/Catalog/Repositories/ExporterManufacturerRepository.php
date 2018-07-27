<?php
namespace Sigurd\mod_exporter_manufacturers\Models\Catalog\Repositories;

use App\Models\Base\BaseRepository;
use Sigurd\mod_exporter_manufacturers\Models\Catalog\ExporterManufacturer;

use Illuminate\Database\Eloquent\Collection;


class ExporterManufacturerRepository extends BaseRepository
{


    /**
     * ManufacturerRepository constructor.
     * @param Manufacturer $model
     */
    public function __construct(ExporterManufacturer $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    /**
     * Seznam
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return Collection
     */
    public function list(array $params) : Collection
    {

      $data = collect($params);

      $list = $this->model;

      $list = $list->newQuery();

      if ($data->has('name')) {
        $list = $list->where('name', 'like', '%'.$data->get('name').'%');
      }

      if (!$data->has('orderBy')) {
        $data->put('orderBy', 'position');
      }

      if (!$data->has('sortBy')) {
        $data->put('sortBy', 'asc');
      }

      $list = $list->orderBy($data->get('orderBy'), $data->get('sortBy'));

      $list = $list->get();

      return $list;
    }



}
