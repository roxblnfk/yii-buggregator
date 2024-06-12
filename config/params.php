<?php

declare(strict_types=1);

use Roxblnfk\Yiigregator\ProfilerDriver;

return [
    'buggregator' => [
        'profiler' => [
            'name' => (string) ($_ENV['PROFILER_APP_NAME'] ?? $_ENV['APP_NAME'] ?? 'my-app'),
            'enabled' => (bool) ($_ENV['PROFILER_ENABLED'] ?? false),
            'endpoint' => (string) ($_ENV['PROFILER_ENDPOINT'] ?? 'http://127.0.0.1:8000/api/profiler/store'),
            'driver' => $_ENV['PROFILER_DRIVER'] ?? ProfilerDriver::XHProf,
        ]
    ],
];
