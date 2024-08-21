<?php

use App\Models\Assignment;
use App\Models\StudentAssignment;
use App\Notifications\DeadlineMissedNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('check:deadlines', function () {
    Log::info('check:deadlines command started');

    // Selecteer opdrachten die verlopen zijn en een status van 1 of 4 hebben
    $assignments = StudentAssignment::where('duedate', '<', now())
        ->whereIn('assignment_status_id', [1, 4])
        ->get();

    Log::info('Found ' . $assignments->count() . ' assignments with overdue deadlines.');

    foreach ($assignments as $assignment) {
        $user = $assignment->enrolmentClass->enrolment->student->user; // Zorg ervoor dat dit correct verwijst naar de student
        if ($user) {
            Log::info("Preparing to notify user {$user->name} for assignment {$assignment->id}");
            $user->notify(new DeadlineMissedNotification($assignment));
            Log::info("Notification sent to user {$user->name} for assignment {$assignment->id}");
        } else {
            Log::info("No user found for assignment {$assignment->id}");
        }
    }

    Log::info('check:deadlines command finished');
})->purpose('Check for missed deadlines')->everyMinute();

