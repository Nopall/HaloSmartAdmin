<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChargingPlace extends Model
{
    use HasFactory;
    protected $table = "charging_places";

    protected $fillable = ['name', 'address', 'latitude', 'longitude', 'user_id'];

    protected $hidden = ['created_at', 'updated_at'];
}
