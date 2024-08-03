<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `expose_php` directive is enabled.
 *
 * This exposes the existence of PHP on your server to potential attackers.
 */
class PhpNotExposed extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('expose_php');
    }

    public function getName(): string
    {
        return 'phpNotExposed';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::fatal('expose_php is enabled, this exposes the existence of PHP on your server to potential attackers');
    }
}
