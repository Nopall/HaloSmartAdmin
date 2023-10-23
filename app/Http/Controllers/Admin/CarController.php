<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CarBrandDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCarBrandRequest;
use App\Services\CarService;
use App\Services\UploadService;

class CarController extends Controller
{
    protected $carService;
    protected $uploadService;

    public function __construct(CarService $carService, UploadService $uploadService)
    {
        $this->carService = $carService;
        $this->uploadService = $uploadService;
    }

    public function index(CarBrandDataTable $dataTable)
    {
        return $dataTable->render('car.list');
    }

    public function formCreateBrand()
    {
        return view('car.form');
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

    public function deleteCarBrandById(String $id)
    {
        $this->carService->deleteCarBrandById($id);

        return response()->json([
            'status' => true,
            'message' => 'Car brand deleted successfully.',
        ]);
    }
}
