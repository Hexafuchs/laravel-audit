<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

class NoShortOpenTagCheck extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('short_open_tag');
    }

    public function getName(): string
    {
        return 'noShortOpenTag';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::warning('short_open_tag is enabled, this could result in issues with XML-Files and should therefore be disabled');
    }
}
