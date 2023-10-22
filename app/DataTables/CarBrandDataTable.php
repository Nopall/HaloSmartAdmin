<?php

namespace App\DataTables;

use App\Models\CarBrand;
use Yajra\DataTables\Services\DataTable;

class CarBrandDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'path.to.action.view')
            ->rawColumns(['action']);
    }

    public function query(CarBrand $model)
    {
        return $model->newQuery()->select('car_brands.*');
    }
}
