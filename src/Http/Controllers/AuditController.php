<?php

namespace Hexafuchs\Audit\Http\Controllers;

use Hexafuchs\Audit\Facades\Audit;
use Illuminate\Support\Collection;

class AuditController
{
    public function handle(): Collection
    {
        return Audit::run();
    }
}
