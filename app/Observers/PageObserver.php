<?php

namespace App\Observers;

use App\Models\Page;
use App\Models\Log;
use Illuminate\Support\Str;

class PageObserver
{
    /**
     * Handle the Page "created" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function created(Page $page)
    {
        $log                  = new Log;
        $log->id              = Str::uuid();
        $log->user_id         = auth()->id() ?? 1;
        $log->action          = 'created';
        $log->logable_type    = get_class($page);
        $log->logable_id      = $page->id;
        $log->url             = request()->server()['REQUEST_URI'];
        $log->ip              = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Page "updated" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function updated(Page $page)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'updated';
        $log->logable_type    = get_class($page);
        $log->logable_id      = $page->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Page "deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function deleted(Page $page)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'deleted';
        $log->logable_type    = get_class($page);
        $log->logable_id      = $page->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Page "restored" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function restored(Page $page)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'restored';
        $log->logable_type    = get_class($page);
        $log->logable_id      = $page->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }

    /**
     * Handle the Page "force deleted" event.
     *
     * @param  \App\Models\Page  $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        $log           = new Log;
        $log->id              = Str::uuid();
        $log->user_id  = auth()->id()  ?? 1;
        $log->action   = 'forceDeleted';
        $log->logable_type    = get_class($page);
        $log->logable_id      = $page->id;
        $log->url      = request()->server()['REQUEST_URI'];
        $log->ip       = request()->server()['REMOTE_ADDR'];
        $log->save();
    }
}
