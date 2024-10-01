<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseLog extends Model
{
    /** @use HasFactory<\Database\Factories\ExerciseLogFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exercise_id',
        'value'
    ];
}
