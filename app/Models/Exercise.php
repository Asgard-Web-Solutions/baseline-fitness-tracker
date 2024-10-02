<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'reps',
        'distance',
        'distance_units',
        'weight_multiplier',
        'time_seconds',
        'invert_time_stat',
        'track_stat',
    ];

    public function exerciseStatuses(): HasMany
    {
        return $this->hasMany(ExerciseStatus::class);
    }
}
