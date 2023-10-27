<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Earning extends Model
{
    use HasFactory;
    protected $table = "earning_details";

    protected $fillable = ['history_id', 'earning_amount', 'earning_type', 'note'];

    protected $hidden = ['created_at', 'updated_at'];

    public function history(): BelongsTo
    {
        return $this->belongsTo(History::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
