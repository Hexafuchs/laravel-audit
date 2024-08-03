<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `display_errors` directive is enabled.
 *
 * This exposes sensitive information and errors to your users and should therefore be disabled.
 */
class DisplaysNoErrors extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('display_errors');
    }

    public function getName(): string
    {
        return 'displaysNoErrors';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::fatal('display_errors is enabled, this exposes sensitive information and errors to your users and should therefore be disabled');
    }
}
