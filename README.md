# Laravel environmental checks and auditing

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hexafuchs/laravel-audit.svg?style=flat-square)](https://packagist.org/packages/hexafuchs/laravel-audit)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hexafuchs/laravel-audit/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hexafuchs/laravel-audit/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/hexafuchs/laravel-audit/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/hexafuchs/laravel-audit/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hexafuchs/laravel-audit.svg?style=flat-square)](https://packagist.org/packages/hexafuchs/laravel-audit)

This package provides simple endpoints that provide information and checks about the environment of the application.
Based on [Hexafuchs/laminas-security](https://github.com/Hexafuchs/laminas-security) and the
[OWASP Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/PHP_Configuration_Cheat_Sheet.html).

Please feel free to debate existing checks and propose new ones. Security is a complex and evolving topic and many
people have better insight into this topic than us. Our focus was to create a framework that others can easily expand both
through the original code as well as through new packages that can register their own checks.

## Installation

You can install the package via composer:

```bash
composer require hexafuchs/laravel-audit
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="audit-config"
```

## Documentation

You can find the entire documentation at [https://hexafuchs.github.io/:package_name/](https://hexafuchs.github.io/:package_name/guide/getting-started/index.html).

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
