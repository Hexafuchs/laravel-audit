<?php

namespace Hexafuchs\Audit\Checks;

abstract class Check implements Checkable
{
    /**
     * Function to check against. This is used by the `execute()` function to check if a positive or negative result is
     * returned.
     */
    abstract public function check(): bool;

    /**
     * Name of the check to identify the result.
     */
    abstract public function getName(): string;

    /**
     * Group of the check to partition the results.
     */
    abstract public function getGroup(): string;

    /**
     * This value is returned if `check()` fails.
     */
    abstract public function getError(): CheckResult;

    /**
     * This executes the check and returns a positive result or the result of `getError()`. You can overwrite this to
     * implement more complex checks.
     */
    public function execute(): CheckResult
    {
        if ($this->check()) {
            return CheckResult::success()->group($this->getGroup())->name($this->getName());
        } else {
            return $this->getError()->group($this->getGroup())->name($this->getName());
        }
    }
}
