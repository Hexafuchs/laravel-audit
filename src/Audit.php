<?php

namespace Hexafuchs\Audit;

use Hexafuchs\Audit\Checks\CheckResult;
use Illuminate\Support\Collection;

/**
 * Contains the logic to execute the tests.
 */
class Audit
{
    /**
     * Executes the checks in the `audit.checks` config array and stores the results into a collection.
     *
     * @return Collection<CheckResult> results of all executed tests
     */
    public function run(): Collection
    {
        $results = Collection::empty();

        foreach (config('audit.checks') as $check) {
            if (! is_string($check)) {
                continue;
            }

            $instance = app($check);

            if (method_exists($instance, 'execute')) {
                $results->push($instance->execute());
            }
        }

        return $results;
    }
}
