<?php

namespace App\Http\Controllers\Admin;

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

    public function index()
    {
        return view('car.list');
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
