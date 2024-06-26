<?php

namespace Hexafuchs\Audit\Commands;

use Hexafuchs\Audit\Checks\CheckState;
use Hexafuchs\Audit\Facades\Audit;
use Illuminate\Console\Command;

class AuditCommand extends Command
{
    public $signature = 'audit
                        {groups?*}
                        {--q|quiet : Do not print anything, only return the exit code}
                        {--s|no-success : Hide successful checks}
                        {--w|no-warning : Hide checks that resulted in the status warning, and also exclude them from the exit code}
                        {--i|no-info : Hide checks that resulted in the status info, and also exclude them from the exit code}
                        {--f|no-fatal : Hide checks that resulted in the status fatal, and also exclude them from the exit code}
                        {--u|no-unknown : Hide checks that resulted in an unknown status, and also exclude them from the exit code}';

    public $description = 'Run the audit in the cli';

    public function handle(): int
    {
        $this->warn('This is not a replacement for running the audit on your webpage, as you are likely using different php.ini files for both.');
        $this->info('');

        $results = Audit::run();

        $exitCode = 0;

        foreach ($results as $result) {
            if (! empty($this->argument('groups')) && ! in_array($result->group, $this->argument('groups'))) {
                continue;
            }
            if (match ($result->state) {
                CheckState::WARNING => $this->option('no-warning'),
                CheckState::FATAL => $this->option('no-fatal'),
                CheckState::SUCCESS => $this->option('no-success'),
                CheckState::INFO => $this->option('no-info'),
                /** @phpstan-ignore-next-line To support tests that extend or do not implement the interface */
                default => $this->option('no-unknown'),
            }) {
                continue;
            }

            $exitCode = max($exitCode, match ($result->state) {
                CheckState::SUCCESS => 0,
                default => 1,
            });

            $printFunc = match ($result->state) {
                CheckState::WARNING => 'warn',
                CheckState::FATAL => 'error',
                CheckState::SUCCESS => 'info',
                default => 'line',
            };

            $this->$printFunc($result->name.': '.$result->message.' ('.$result->state->value.')');
        }

        return $exitCode;
    }
}
