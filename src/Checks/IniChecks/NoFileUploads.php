<?php

namespace Hexafuchs\Audit\Checks\IniChecks;

use Hexafuchs\Audit\Checks\Check;
use Hexafuchs\Audit\Checks\CheckResult;
use Hexafuchs\Audit\Helper\IniConverter;

/**
 * Checks if the `file_uploads` directive is enabled.
 *
 * If your application is not using file uploads, and say the only data the user will enter / upload is forms that do
 * not require any document attachments, file_uploads should be turned off.
 */
class NoFileUploads extends Check
{
    public function check(): bool
    {
        return ! IniConverter::convertValue('file_uploads');
    }

    public function getName(): string
    {
        return 'noFileUploads';
    }

    public function getGroup(): string
    {
        return 'ini';
    }

    public function getError(): CheckResult
    {
        return CheckResult::info('file_uploads is enabled, if your application is not using file uploads, and say the only data the user will enter / upload is forms that do not require any document attachments, file_uploads should be turned off');
    }
}
