<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if all functions from the `audit.forbiddenFunctions` config array are disabled.
 *
 * These functions should only be enabled if required to minimize attack target.
 */
class NoForbiddenFunctions extends Check
{
    public function getMissingFunctions(): array
    {
        return array_filter(config('audit.forbiddenFunctions'), fn ($e) => ! in_array($e, explode(', ', IniConverter::convertValue('disable_functions'))));
    }

    public function check(): bool
    {
        return count($this->getMissingFunctions()) == 0;
    }

    public function getName(): string
    {
        return 'noForbiddenFunctions';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::info('The following functions are enabled, consider disabling them if possible or remove them from the config otherwise: '.implode(', ', $this->getMissingFunctions()));
    }
}
