<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `short_open_tag` directive is enabled.
 *
 * This could result in issues with XML-Files and should therefore be disabled.
 */
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
