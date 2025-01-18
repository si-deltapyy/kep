<?php

namespace App\Observers;

use App\Models\ECLog;
use App\Models\ECDocument;

class ECObserver
{
    /**
     * Handle the ECDocument "created" event.
     */
    public function created(ECDocument $eCDocument): void
    {
        if ($eCDocument->isDirty('ec_status')) {
            ECLog::create([
                'ec_id' => $eCDocument->id,
                'old_status' => $eCDocument->getOriginal('ec_status'),
                'new_status' => $eCDocument->ec_status,
                'changed_at' => now(),
            ]);
        }
    }

    /**
     * Handle the ECDocument "updated" event.
     */
    public function updated(ECDocument $eCDocument): void
    {
        if ($eCDocument->isDirty('ec_status')) {
            ECLog::create([
                'ec_id' => $eCDocument->id,
                'old_status' => $eCDocument->getOriginal('ec_status'),
                'new_status' => $eCDocument->ec_status,
                'changed_at' => now(),
            ]);
        }
    }

    /**
     * Handle the ECDocument "deleted" event.
     */
    public function deleted(ECDocument $eCDocument): void
    {
        //
    }

    /**
     * Handle the ECDocument "restored" event.
     */
    public function restored(ECDocument $eCDocument): void
    {
        //
    }

    /**
     * Handle the ECDocument "force deleted" event.
     */
    public function forceDeleted(ECDocument $eCDocument): void
    {
        //
    }
}
