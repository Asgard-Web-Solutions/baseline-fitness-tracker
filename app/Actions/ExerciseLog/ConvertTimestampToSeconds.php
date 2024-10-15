<?php

namespace App\Actions\ExerciseLog;

use App\Models\Exercise;
use App\Models\ExerciseLog;
use App\Models\ExerciseStatus;

class ConvertTimestampToSeconds
{
    public static function execute($timeString)
    {
        $columns = array_reverse(explode(':', $timeString));
        $totalTime = 0;

        if (array_key_exists(0, $columns)) {
            if (is_numeric($columns[0])) {
                $totalTime += trim($columns[0]);
            }
        }

        if (array_key_exists(1, $columns)) {
            if (is_numeric($columns[1])) {
                $totalTime += (trim($columns[1]) * 60);
            }
        }

        if (array_key_exists(2, $columns)) {
            if (is_numeric($columns[2])) {
                $totalTime += (trim($columns[2]) * 60 * 60);
            }
        }

        return $totalTime;
    }
}
