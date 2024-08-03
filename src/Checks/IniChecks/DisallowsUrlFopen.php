<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `allow_url_fopen` directive is enabled.
 *
 * This would allow fopen() to access urls like https:// and ftp:// and therefore it could download malicious files and execute them.
 */
class DisallowsUrlFopen extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('allow_url_fopen');
    }

    public function getName(): string
    {
        return 'disallowsUrlFopen';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::fatal('allow_url_fopen is enabled, this allows fopen() to access urls like https:// and ftp:// and therefore could download malicious files and execute them');
    }
}
