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
        return $this->belongsTo(Exercise::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exerciseLog(): BelongsTo
    {
        return $this->belongsTo(ExerciseLog::class);
    }
}
