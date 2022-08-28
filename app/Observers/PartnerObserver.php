<?php

namespace App\Observers;

use App\Models\Partner;
use App\Models\Log;
use Illuminate\Support\Str;

class PartnerObserver
{
    /**
     * Handle the Partner "created" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function created(Partner $partner)
    {
        $log                  = new Log;
        $log->id              = Str::uuid();
        $log->user_id         = auth()->id() ?? 1;
        $log->action          = 'created';
        $log->logable_type    = get_class($partner);
        $log->logable_id      = $partner->id;
        $log->url             = request()->server()['REQUEST_URI'];
        $log->ip              = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Partner "updated" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function updated(Partner $partner)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'updated';
        $log->logable_type    = get_class($partner);
        $log->logable_id      = $partner->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Partner "deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'deleted';
        $log->logable_type    = get_class($partner);
        $log->logable_id      = $partner->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Partner "restored" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'restored';
        $log->logable_type    = get_class($partner);
        $log->logable_id      = $partner->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Partner "force deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'forceDeleted';
        $log->logable_type    = get_class($partner);
        $log->logable_id      = $partner->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }
}
