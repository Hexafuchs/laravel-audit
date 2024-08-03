<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `enable_dl` directive is enabled.
 *
 * This could let an attack bypass restrictions by open_basedir and allow access to any file on the system.
 */
class DlDisabled extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('enable_dl');
    }

    public function getName(): string
    {
        return 'dlDisabled';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::fatal('enable_dl is enabled, this could let an attack bypass restrictions by open_basedir and allow access to any file on the system');
    }
}
