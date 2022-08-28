<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $log                  = new Log;
        $log->id              = Str::uuid();
        $log->user_id         = auth()->id() ?? 1;
        $log->action          = 'created';
        $log->logable_type    = get_class($user);
        $log->logable_id      = $user->id;
        $log->url             = request()->server()['REQUEST_URI'];
        $log->ip              = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'updated';
        $log->logable_type    = get_class($user);
        $log->logable_id      = $user->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'deleted';
        $log->logable_type    = get_class($user);
        $log->logable_id      = $user->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'restored';
        $log->logable_type    = get_class($user);
        $log->logable_id      = $user->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'forceDeleted';
        $log->logable_type    = get_class($user);
        $log->logable_id      = $user->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

}
