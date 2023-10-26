<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuelType extends Model
{
    use HasFactory;
    protected $table = "fuel_type";

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];
}
