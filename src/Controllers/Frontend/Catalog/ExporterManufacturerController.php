<?php

namespace App\Http\Controllers\Frontend\Catalog;

use Sigurd\mod_exporter_manufacturers\Models\Catalog\ExporterManufacturer;
use Sigurd\mod_exporter_manufacturers\Models\Catalog\Repositories\ExporterManufacturerRepository;

use App\Http\Controllers\Frontend\Base\BaseController;
use Illuminate\Http\Request;

class ExporterManufacturerController extends BaseController
{


    /**
     * @var ExporterManufacturerRepository
     */


    private $repo;



    /**
     * ProductController constructor.
     * @param ExporterManufacturerRepository $productRepository
     */
    public function __construct(ExporterManufacturerRepository $repo)
    {

        $this->repo = $repo;

    }


    /**
     * Zobrazení výpisu
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->repo->list($request->toArray());

        $list = $list->map(function (ExporterManufacturer $item) {
            return $item;
        })->all();

        return view('frontend.catalog.exporter.manufacturers.index', [
            'export' => $this->repo->paginateArrayResults($list, $request->perPage ? $request->perPage : 50)->toJson()
        ]);



    }

}
