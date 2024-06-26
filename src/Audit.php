<?php

namespace Hexafuchs\Audit;

use Hexafuchs\Audit\Checks\CheckResult;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Collection;

class Audit {
    /**
     * @return Collection<CheckResult>
     * @throws BindingResolutionException
     */
    public function run(): Collection
    {
        $results = Collection::empty();

        foreach (config('audit.checks') as $check) {
            if (!is_string($check)) {
                continue;
            }

            $instance = app()->make($check);

            if (method_exists($instance, 'execute')) {
                $results->push($instance->execute());
            }
        }

        return $results;
    }
}
