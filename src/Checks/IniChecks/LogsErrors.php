<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `enable_dl` directive is disabled.
 *
 * This forbids logging errors to a log file which prevents monitoring of issues in your application.
 */
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
