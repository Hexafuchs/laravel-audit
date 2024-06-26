<?php

namespace Hexafuchs\Audit\Checks;

interface Checkable
{
    /**
     * Called to execute the check.
     */
    public function execute(): CheckResult;
}
