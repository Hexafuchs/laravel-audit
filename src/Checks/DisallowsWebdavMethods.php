<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

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
