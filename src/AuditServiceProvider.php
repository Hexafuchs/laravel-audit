<?php

namespace Hexafuchs\Audit;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Hexafuchs\Audit\Commands\AuditCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-audit_table')
            ->hasCommand(AuditCommand::class);
    }
}
