<?php

it('contains only strings in check config', function () {
    foreach (config('audit.checks') as $check) {
        expect($check)->toBeString();
    }
});

it('contains only checks with execute functions', function () {
    foreach (config('audit.checks') as $check) {
        $instance = app()->make($check);
        expect(get_class($instance))
            ->toHaveMethod('execute');
    }
});

it('contains checks with different names', function () {
    foreach (config('audit.checks') as $check) {
        $instance = app()->make($check);
        expect($instance->execute())->toBeInstanceOf(\Hexafuchs\Audit\Checks\CheckResult::class);
    }
});

it('contains no null values', function () {
    foreach (config('audit.checks') as $check) {
        $instance = app()->make($check);
        expect($instance->getName())->not->toBeEmpty()
            ->and($instance->getGroup())->not->toBeEmpty()
            ->and($instance->getError())->not->toBeEmpty();
    }
});

it('contains different names', function () {
    $names = [];
    foreach (config('audit.checks') as $check) {
        $instance = app()->make($check);
        $names[] = $instance->getName();
    }
    expect(count($names))->toBe(count(array_unique($names)));
});

it('contains different errors', function () {
    $errors = [];
    foreach (config('audit.checks') as $check) {
        $instance = app()->make($check);
        $errors[] = $instance->getError()->message;
    }

    expect(count($errors))->toBe(count(array_unique($errors)));
});
