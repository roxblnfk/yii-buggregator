<?php

declare(strict_types=1);

namespace Roxblnfk\Yiigregator;

use SpiralPackages\Profiler\Driver\NullDriver;
use SpiralPackages\Profiler\Driver\TidyWaysDriver;
use SpiralPackages\Profiler\Driver\UprofilerDriver;
use SpiralPackages\Profiler\Driver\XhprofDriver;

enum ProfilerDriver: string
{
    case XHProf = XhprofDriver::class;
    case TidyWays = TidyWaysDriver::class;
    case UProfiler = UprofilerDriver::class;
    case Null = NullDriver::class;
}
