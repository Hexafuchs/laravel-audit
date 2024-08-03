<?php

// config for Hexafuchs/Audit
return [
    // Checks to include into the audit. You can also add your own checks or checks from different packages here.
    'checks' => [
        \Hexafuchs\Audit\Checks\IniChecks\NoShortOpenTagCheck::class,
        \Hexafuchs\Audit\Checks\IniChecks\ZendIgnoresExceptionArgs::class,
        \Hexafuchs\Audit\Checks\IniChecks\ZendExceptionStringLimitationExists::class,
        \Hexafuchs\Audit\Checks\IniChecks\PhpNotExposed::class,
        \Hexafuchs\Audit\Checks\IniChecks\DisplaysNoErrors::class,
        \Hexafuchs\Audit\Checks\IniChecks\DisplaysNoStartupErrors::class,
        \Hexafuchs\Audit\Checks\IniChecks\LogsErrors::class,
        \Hexafuchs\Audit\Checks\IniChecks\LogsRepeatedErrors::class,
        \Hexafuchs\Audit\Checks\IniChecks\DisallowsUrlFopen::class,
        \Hexafuchs\Audit\Checks\IniChecks\DisallowsUrlInclude::class,
        \Hexafuchs\Audit\Checks\IniChecks\DisallowsWebdavMethods::class,
        \Hexafuchs\Audit\Checks\IniChecks\NoFileUploads::class,
        \Hexafuchs\Audit\Checks\IniChecks\DlDisabled::class,
        \Hexafuchs\Audit\Checks\IniChecks\NoForbiddenFunctions::class,
        \Hexafuchs\Audit\Checks\IniChecks\MemoryLeaksReported::class,
        \Hexafuchs\Audit\Checks\IniChecks\TracksNoErrors::class,
        \Hexafuchs\Audit\Checks\IniChecks\NoHTMLErrors::class,
    ],
    // List of middlewares to be passed to the route. You can use this to restrict access to the route, as you
    // probably should do.
    'middleware' => [
        'api',
    ],
    // Path of the api route.
    'path' => '/api/audit',
    // PHP functions that can not be executed. Remove the functions you require for your instance to operate.
    'forbiddenFunctions' => [
        'system',
        'exec',
        'shell_exec',
        'passthru',
        'phpinfo',
        'show_source',
        'highlight_file',
        'popen',
        // 'proc_open',
        'fopen_with_path',
        'dbmopen',
        'dbase_open',
        'putenv',
        'move_uploaded_file',
        'chdir',
        'mkdir',
        'rmdir',
        // 'chmod',
        'rename',
        'filepro',
        'filepro_rowcount',
        'filepro_retrieve',
        'posix_mkfifo',
    ],
];
