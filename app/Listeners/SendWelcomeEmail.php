<?php

namespace App\Listeners;

use App\Events\RoleCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public $tries = 3;

    public function handle(RoleCreated $event): void
    {
        logger('Send welcome email');

        sleep(5);
    }
}
