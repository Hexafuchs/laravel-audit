<?php

namespace Hexafuchs\Audit\Http\Controllers;

use Hexafuchs\Audit\Facades\Audit;
use Illuminate\Support\Collection;

/**
 * Controller to execute the tests in {@see \Hexafuchs\Audit\Http\Controllers\AuditController::handle()} and return the
 * results as collection. Can be attached to a route.
 */
class AuditController
{
    /**
     * Executes the checks and returns the results as collection.
     *
     * @return Collection
     */
    public function handle(): Collection
    {
        return Audit::run();
    }
}
