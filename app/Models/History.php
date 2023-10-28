<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;
    protected $table = "histories";

    protected $fillable = ['note_type_id', 'user_id', 'date', 'time', 'odometer'];

    protected $hidden = ['created_at', 'updated_at'];

    public function noteType(): BelongsTo
    {
        return $this->belongsTo(NoteType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
