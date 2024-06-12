<?php

declare(strict_types=1);

namespace Roxblnfk\Yiigregator\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use SpiralPackages\Profiler\Profiler;

class ProfilerMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly Profiler $profiler,
    ) {}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            $this->profiler->start();
            return $handler->handle($request);
        } finally {
            // todo: send data after a 'response sent' event
            $this->profiler->end();
        }
    }
}
