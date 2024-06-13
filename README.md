# Yiigregator

[![Twitter](https://img.shields.io/badge/-Follow-black?style=flat-square&logo=X)](https://twitter.com/roxblnfk)
[![Support](https://img.shields.io/static/v1?style=flat-square&label=Support&message=%E2%9D%A4&logo=GitHub&color=%23fe0086)](https://patreon.com/roxblnfk)
[![Discord](https://img.shields.io/static/v1?style=flat-square&label=Join&message=Buggregator%20Discord&logo=Discord&color=%235865F2)](https://discord.gg/qF3HpXhMEP)

Integration package for [Buggregator](https://buggregator.dev/) with Yii.

## Installation

Install the package via composer:

```bash
composer require roxblnfk/yiigregator
```

If you use Yii with `composer-config-plugin`, the package might be configured via environment variables only.

## Usage

### Profiling

1. Add the `Roxblnfk\Yiigregator\Middleware\ProfilerMiddleware` middleware to the top of the middlewares list (possibly in the `$params['middlewares']`).
2. Turn on the profiler and set the Buggregator endpoint using environment variables:
  ```env
  PROFILER_ENABLED=true
  PROFILER_ENDPOINT=http://127.0.0.1:8000/api/profiler/store
  ```

> [!NOTE]
> `http://127.0.0.1:8000/api/profiler/store` is the default value for the Buggregator endpoint.

> [!NOTE]
> Depending on your environment, you may need to set the `PROFILER_ENDPOINT` to a different value.
> For example, if you are using Docker, you may need to set it to `http://buggregator:8000/api/profiler/store`.

By default, XHProf is used for profiling. Make sure it is installed and enabled in your PHP configuration.

## License

Yiigregator is open-sourced software licensed under the BSD-3 license.
