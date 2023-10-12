<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;
    protected $table = "cars";

    protected $fillable = [
        'car_name', 'car_model', 'police_number', 'police_number_year',
        'tank_type', 'fuel_type_id', 'capacity'
    ];

    public function carBrand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }
    


}
