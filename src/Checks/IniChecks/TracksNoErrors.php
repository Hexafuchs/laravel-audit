<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `enable_dl` directive is enabled.
 *
 * This can expose the latest error message via a variable, giving an intruder more information about the system
 */
class TracksNoErrors extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('track_errors');
    }

    public function getName(): string
    {
        return 'tracksNoErrors';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::warning('track_errors is enabled, which can expose the latest error message via a variable, giving an intruder more information about the system');
    }
}
