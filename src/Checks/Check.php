<?php

namespace Hexafuchs\Audit\Checks;

/**
 * Convenience base class for binary checks.
 *
 * When {@see \Hexafuchs\Audit\Checks\Check::execute()} is called, it uses the
 * {@see \Hexafuchs\Audit\Checks\Check::check()} method to determine if the test was successful. If so,
 * {@see \Hexafuchs\Audit\Checks\CheckResult::success()} using the values from
 * {@see \Hexafuchs\Audit\Checks\Check::getGroup()} and {@see \Hexafuchs\Audit\Checks\Check::getName()}. Otherwise,
 * the check result from {@see \Hexafuchs\Audit\Checks\Check::getError()} is enriched with the name and the group and
 * returned.
 */
abstract class Check implements Checkable
{
    /**
     * Function to check against. This is used by the execute() function to check if a
     * positive or negative result is returned.
     *
     * @see \Hexafuchs\Audit\Checks\Check::execute()
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
     * This value is returned if check() fails.
     *
     * @see \Hexafuchs\Audit\Checks\Check::check()
     */
    abstract public function getError(): CheckResult;

    /**
     * This executes the check and returns a positive result or the result of getError(). You can overwrite this to
     * implement more complex checks.
     *
     * @see \Hexafuchs\Audit\Checks\Check::getError()
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
