<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `allow_webdav_methods` directive is enabled.
 *
 * Unless properly secured webdav can be abused to bypass authorization and in some circumstances achieve remote code execution.
 */
class DisallowsWebdavMethods extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('allow_webdav_methods');
    }

    public function getName(): string
    {
        return 'disallowsWebdavMethods';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::fatal('allow_webdav_methods is enabled, unless properly secured webdav can be abused to bypass authorization and in some circumstances achieve remote code execution');
    }
}
