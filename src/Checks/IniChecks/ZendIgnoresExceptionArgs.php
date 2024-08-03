<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `zend.exception_ignore_args` directive is disabled.
 *
 * This could expose sensitive information within stack traces.
 */
class ZendIgnoresExceptionArgs extends Check
{
    public function check(): bool
    {
        return IniConverter::convertValue('zend.exception_ignore_args');
    }

    public function getName(): string
    {
        return 'zendIgnoresExceptionArgs';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::fatal('zend.exception_ignore_args is disabled, this could expose sensitive information within stack traces');
    }
}
