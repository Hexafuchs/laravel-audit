<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `html_errors` directive is enabled.
 *
 * This could lead to the inclusion of html tags in error messages.
 */
class NoHTMLErrors extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('html_errors');
    }

    public function getName(): string
    {
        return 'noHtmlErrors';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::info('html_errors is enabled, which leads to the inclusion of html tags in error messages');
    }
}
