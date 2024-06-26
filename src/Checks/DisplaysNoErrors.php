<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

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
