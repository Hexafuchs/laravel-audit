<?php

// config for Hexafuchs/Audit
return [
    // Checks to include into the audit. You can also add your own checks or checks from different packages here.
    'checks' => [],
    // List of middlewares to be passed to the route. You can use this to restrict access to the route, as you
    // probably should do.
    'middleware' => [
        'api'
    ],
    // Path of the api route.
    'path' => '/api/audit',
];
