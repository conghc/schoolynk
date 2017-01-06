<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\User;
use App\Student;
use App\Message;
use App\Favorite;
use App\University;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        Student::deleting(function($student)
        {
            Message::where('student_id', $student->id)->delete();
            Favorite::where('student_id', $student->id)->delete();
        });

        University::deleting(function($university)
        {
            Message::where('university_id', $university->id)->delete();
            Favorite::where('university_id', $university->id)->delete();
        });
    }
}
