<?php

namespace Hexafuchs\Audit\Checks;

use Hexafuchs\Audit\Helper\IniConverter;

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
