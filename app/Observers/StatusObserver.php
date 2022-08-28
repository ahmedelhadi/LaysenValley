<?php

namespace App\Observers;

use App\Models\Status;
use App\Models\Log;
use Illuminate\Support\Str;

class StatusObserver
{
    /**
     * Handle the Status "created" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function created(Status $status)
    {
        $log                  = new Log;
        $log->id              = Str::uuid();
        $log->user_id         = auth()->id() ?? 1;
        $log->action          = 'created';
        $log->logable_type    = get_class($status);
        $log->logable_id      = $status->id;
        $log->url             = request()->server()['REQUEST_URI'];
        $log->ip              = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Status "updated" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function updated(Status $status)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'updated';
        $log->logable_type    = get_class($status);
        $log->logable_id      = $status->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Status "deleted" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function deleted(Status $status)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'deleted';
        $log->logable_type    = get_class($status);
        $log->logable_id      = $status->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Status "restored" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function restored(Status $status)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'restored';
        $log->logable_type    = get_class($status);
        $log->logable_id      = $status->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Status "force deleted" event.
     *
     * @param  \App\Models\Status  $status
     * @return void
     */
    public function forceDeleted(Status $status)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'forceDeleted';
        $log->logable_type    = get_class($status);
        $log->logable_id      = $status->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }
}
