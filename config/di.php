<?php

declare(strict_types=1);

use Roxblnfk\Yiigregator\Factory\ProfilerMiddlewareFactory;
use Roxblnfk\Yiigregator\Middleware\ProfilerMiddleware;
use Roxblnfk\Yiigregator\ProfilerDriver;

/**
 * @var array $params
 */

return [
    ProfilerMiddleware::class => new ProfilerMiddlewareFactory(
        enabled: $params['buggregator']['profiler']['enabled'],
        appName: $params['buggregator']['profiler']['name'],
        endpoint: $params['buggregator']['profiler']['endpoint'],
        driver: $params['buggregator']['profiler']['driver'] instanceof ProfilerDriver
            ? $params['buggregator']['profiler']['driver']
            : ProfilerDriver::tryFrom($params['buggregator']['profiler']['driver']),
    ),
];
