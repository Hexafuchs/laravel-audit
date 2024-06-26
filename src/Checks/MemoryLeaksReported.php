<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

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
