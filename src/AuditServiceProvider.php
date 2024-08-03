<?php

namespace Hexafuchs\Audit;

use Hexafuchs\Audit\Commands\AuditCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * Registration of the package.
 */
class AuditServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-audit')
            ->hasConfigFile('audit')
            ->hasRoute('api')
            ->hasCommand(AuditCommand::class);
    }
}
