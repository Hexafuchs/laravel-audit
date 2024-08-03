<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `report_memleaks` directive is disabled.
 *
 * This might lead to memory leaks going unnoticed.
 */
class MemoryLeaksReported extends Check
{
    public function check(): bool
    {
        return IniConverter::convertValue('report_memleaks');
    }

    public function getName(): string
    {
        return 'memoryLeaksReported';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::info('report_memleaks is disabled, which might lead to memory leaks going unnoticed');
    }
}
