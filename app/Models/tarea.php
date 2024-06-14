<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tarea extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'due_date', 'priority', 'status', 'tag', 'assigned_to', 'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
