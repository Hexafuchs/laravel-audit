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

## Usage

To gather the results of the checks, make a call to `/api/route`. The result is an array of all checks, with their name,
group, status and some description for non-successful checks. Checks can result in a success (which is fine), an info
(which might depend on your situation), a warning (which is likely problematic) or a fatal (which is almost always
unwanted).

You can configure the checks and some behaviour in the `config/audit.php` after publishing the config file. You should
most probably add a middleware to restrict the access to the route.

You can also use artisan. Note that this is only really useful for testing or if you have the same php configuration
for the CLI and the webserver which if you are not sure is probably not the case. It is advised to always check this
result against the result of `/api/route`. To execute the command, execute `php artisan audit`. You can pass group
names as arguments to only execute these groups. The exit code is `1` if and only if a non-successful check was
executed. You can also exclude check states, to list the available options execute the `--help` option.

## Plugins

If you want to create your own checks instead of working on the original repo, you can simple let your checks extend
the abstract \Hexafuchs\Audit\Checks\Check class or implement the \Hexafuchs\Audit\Checks\Checkable interface, then
merge your checks into the audit.checks config array.

You can also not implement the interface if you want to have another return type, all checks in audit.checks that
contain an execute function will be executed with no arguments. Note that you will not be able to have colored output
in the artisan command for other status values.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
