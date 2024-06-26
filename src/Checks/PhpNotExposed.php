<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

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
