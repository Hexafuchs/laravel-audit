<?php

// config for Hexafuchs/Audit
return [
    // Checks to include into the audit. You can also add your own checks or checks from different packages here.
    'checks' => [
        \Hexafuchs\Audit\Checks\NoShortOpenTagCheck::class,
        \Hexafuchs\Audit\Checks\ZendIgnoresExceptionArgs::class,
        \Hexafuchs\Audit\Checks\ZendExceptionStringLimitationExists::class,
        \Hexafuchs\Audit\Checks\PhpNotExposed::class,
        \Hexafuchs\Audit\Checks\DisplaysNoErrors::class,
        \Hexafuchs\Audit\Checks\DisplaysNoStartupErrors::class,
        \Hexafuchs\Audit\Checks\LogsErrors::class,
        \Hexafuchs\Audit\Checks\LogsRepeatedErrors::class,
        \Hexafuchs\Audit\Checks\DisallowsUrlFopen::class,
        \Hexafuchs\Audit\Checks\DisallowsUrlInclude::class,
        \Hexafuchs\Audit\Checks\DisallowsWebdavMethods::class,
        \Hexafuchs\Audit\Checks\NoFileUploads::class,
        \Hexafuchs\Audit\Checks\DlDisabled::class,
        \Hexafuchs\Audit\Checks\NoForbiddenFunctions::class,
        \Hexafuchs\Audit\Checks\MemoryLeaksReported::class,
        \Hexafuchs\Audit\Checks\TracksNoErrors::class,
        \Hexafuchs\Audit\Checks\NoHTMLErrors::class,
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
