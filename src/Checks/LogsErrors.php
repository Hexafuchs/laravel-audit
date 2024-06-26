<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

class LogsErrors extends Check
{
    public function check(): bool
    {
        return IniConverter::convertValue('log_errors');
    }

    public function getName(): string
    {
        return 'logsErrors';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::warning('log_errors is disabled, this forbids logging errors to a log file which prevents monitoring of issues in your application');
    }
}
