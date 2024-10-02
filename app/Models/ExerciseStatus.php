<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExerciseStatus extends Model
{
    /** @use HasFactory<\Database\Factories\ExerciseStatusFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exercise_id',
        'exercise_log_id',
        'completed',
        'deficient_amount'
    ];

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(App\Models\Exercise::class);
    }
}
