<?php

declare(strict_types=1);

namespace Roxblnfk\Yiigregator\Factory;

use Roxblnfk\Yiigregator\Middleware\ProfilerMiddleware;
use Roxblnfk\Yiigregator\ProfilerDriver;
use SpiralPackages\Profiler\Driver\DriverInterface;
use SpiralPackages\Profiler\DriverFactory;
use SpiralPackages\Profiler\Profiler;
use SpiralPackages\Profiler\Storage\NullStorage;
use SpiralPackages\Profiler\Storage\StorageInterface;
use SpiralPackages\Profiler\Storage\WebStorage;
use Symfony\Component\HttpClient\NativeHttpClient;

class ProfilerMiddlewareFactory
{
    /**
     * @param bool $enabled
     * @param non-empty-string $appName
     * @param non-empty-string $endpoint
     * @param ProfilerDriver|null $driver
     */
    public function __construct(
        private readonly bool $enabled,
        private readonly string $appName,
        private readonly string $endpoint,
        private readonly ?ProfilerDriver $driver,
    ) {
    }

    public function __invoke(): ProfilerMiddleware
    {
        return new ProfilerMiddleware($this->createProfiler());
    }

    private function createProfiler(): Profiler
    {
        return new Profiler(
            $this->createStorage(),
            $this->createDriver(),
            $this->appName,
        );
    }

    public function createStorage(): StorageInterface
    {
        // todo detect endpoint

        if (!$this->enabled) {
            return new NullStorage();
        }

        return new WebStorage(
            new NativeHttpClient(),
            $this->endpoint,
        );
    }

    public function createDriver(): DriverInterface
    {
        return match ($this->driver) {
            ProfilerDriver::XHProf => DriverFactory::createXhrofDriver(),
            ProfilerDriver::TidyWays => DriverFactory::createTidyWaysDriver(),
            ProfilerDriver::UProfiler => DriverFactory::createUprofilerDriver(),
            ProfilerDriver::Null => DriverFactory::createNullDriver(),
            default => DriverFactory::detect(),
        };
    }
}
