<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `display_startup_errors` directive is enabled.
 *
 * This exposes sensitive information and errors to your users and should therefore be disabled.
 */
class DisplaysNoStartupErrors extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('display_startup_errors');
    }

    public function getName(): string
    {
        return 'displaysNoStartupErrors';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::fatal('display_startup_errors is enabled, this exposes sensitive information and errors to your users and should therefore be disabled');
    }
}
