<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

class LogsRepeatedErrors extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('ignore_repeated_errors');
    }

    public function getName(): string
    {
        return 'logsRepeatedErrors';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::info('ignore_repeated_errors is enabled, this hides errors that occur multiple times from appearing in your logs');
    }
}
