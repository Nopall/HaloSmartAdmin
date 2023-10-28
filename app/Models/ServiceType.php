<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceType extends Model
{
    use HasFactory;
    protected $table = "service_types";

    protected $fillable = ['name', 'user_id'];

    protected $hidden = ['created_at', 'updated_at'];
}
