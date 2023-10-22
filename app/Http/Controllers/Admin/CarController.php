<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CarBrandDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Car\CreateCarBrandRequest;
use App\Services\CarService;

class CarController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index(CarBrandDataTable $dataTable)
    {
        return $dataTable->render('car.list');
    }

    public function createCarBrand(CreateCarBrandRequest $request)
    {
        $data = $request->validated();

        $carBrand = $this->carService->createCarBrand($data['name'], $data['logo']);

        return response()->json([
            'status' => true,
            'message' => 'Car brand created successfully.',
            'data' => $carBrand,
        ]);
    }
}
