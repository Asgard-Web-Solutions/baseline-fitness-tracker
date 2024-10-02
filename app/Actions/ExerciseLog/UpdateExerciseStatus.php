<?php

namespace App\Actions\ExerciseLog;

use App\Models\Exercise;
use App\Models\ExerciseLog;
use App\Models\ExerciseStatus;
use App\Models\User;

class UpdateExerciseStatus
{
    public static function execute(ExerciseStatus $exerciseStatus, ExerciseLog $exerciseLog)
    {
        $exercise = $exerciseStatus->exercise;
        $data = $exerciseLog->value;
        $user = $exerciseLog->user;

        $completed = 0;
        $deficient = 0;

        if ($exercise->track_stat == 'reps') {
            if ($data >= $exercise->reps) {
                $completed = 1;
            } else {
                $deficient = $exercise->reps - $data;
            }
        }

        if ($exercise->track_stat == 'distance') {
            if ($data >= $exercise->distance) {
                $completed = 1;
            } else {
                $deficient = $exercise->distance - $data;
            }
        }

        if ($exercise->track_stat == 'weight') {
            $weightLog = GetLatestUserWeight::execute($user);
            $targetWeight = ($weightLog->weight * $exercise->weight_multiplier);

            if ($data >= $targetWeight) {
                $completed = 1;
            } else {
                $deficient = $targetWeight - $data;
            }
        }

        if ($exercise->track_stat == 'time') {
            if ($exercise->invert_time_stat) {
                if ($data >= $exercise->time_seconds) {
                    $completed = 1;
                } else {
                    $deficient = $exercise->time_seconds - $data;
                }
            } else {
                if ($data <= $exercise->time_seconds) {
                    $completed = 1;
                } else {
                    $deficient = $data - $exercise->time_seconds;
                }
            }
        }

        $exerciseStatus->update([
            'exercise_log_id' => $exerciseLog->id,
            'completed' => $completed,
            'deficient_amount' => $deficient,
        ]);
    }
}
