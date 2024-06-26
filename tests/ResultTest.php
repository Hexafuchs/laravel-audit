<?php

use Hexafuchs\Audit\Facades\Audit;

it('returns check results', function () {
    $result = Audit::run();

    expect($result->doesntContain(fn ($e) => ! ($e instanceof \Hexafuchs\Audit\Checks\CheckResult)))->toBeTrue();
});

it('contains enough results', function () {
    $result = Audit::run();

    expect($result->count() === count(config('audit.checks')))->toBeTrue();
});

it('contains no null group names', function () {
    $result = Audit::run();

    expect($result->map(fn ($e) => $e->group)->doesntContain(fn ($e) => $e === null))->toBeTrue();
});

it('contains unique names', function () {
    $result = Audit::run();
    $names = $result->map(fn ($e) => $e->name);

    expect($names->count() === $names->unique()->count())->toBeTrue();
});
