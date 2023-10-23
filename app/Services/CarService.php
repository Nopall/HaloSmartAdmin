<?php

namespace App\Services;

namespace App\Services;

use App\Models\CarBrand;
use Illuminate\Http\UploadedFile;

class CarService
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function createCarBrand(string $name, UploadedFile $logo)
    {
        $logoPath = $this->uploadService->upload($logo, 'car_brands');

        $brand = CarBrand::create([
            'name' => $name,
            'logo' => $logoPath,
        ]);

        return $brand;
    }
}
