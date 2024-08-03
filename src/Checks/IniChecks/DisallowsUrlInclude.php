<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `allow_url_include` directive is enabled.
 *
 * This would allow include and require statements to access urls like https:// and ftp:// and therefore they could download malicious files and execute them.
 */
class DisallowsUrlInclude extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('allow_url_include');
    }

    public function getName(): string
    {
        return 'disallowsUrlInclude';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::fatal('allow_url_include is enabled, this allows include and require statements to access urls like https:// and ftp:// and therefore could download malicious files and execute them');
    }
}
