<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

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
        return CheckResult::info('the following functions are enabled, consider disabling them if possible or remove them from the config otherwise: ' . implode(', ', $this->getMissingFunctions()));
    }
}
