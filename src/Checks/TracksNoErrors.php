<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

class TracksNoErrors extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('track_errors');
    }

    public function getName(): string
    {
        return 'tracksNoErrors';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::warning('track_errors is enabled, which can expose the latest error message via an variable, giving an intruder more information about the system');
    }
}
