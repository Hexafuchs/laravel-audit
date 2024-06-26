<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

class ZendExceptionStringLimitationExists extends Check
{
    public function check(): bool
    {
        return IniConverter::convertValue('zend.exception_string_param_max_len') <= 0;
    }

    public function getName(): string
    {
        return 'zendExceptionStringLimitationExists';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::fatal('zend.exception_string_param_max_len is greater than zero, this could expose sensitive information within stack traces');
    }
}
