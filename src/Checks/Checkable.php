<?php

namespace Hexafuchs\Audit\Checks;

/**
 * Interface all checks should implement.
 */
interface Checkable
{
    /**
     * Called to execute the check.
     */
    public function execute(): CheckResult;
}
