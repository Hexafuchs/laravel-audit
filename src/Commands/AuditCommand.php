<?php

namespace Hexafuchs\Audit\Commands;

use Illuminate\Console\Command;

class AuditCommand extends Command
{
    public $signature = 'laravel-audit';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
