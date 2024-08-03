<?php

namespace Hexafuchs\Audit\Checks;

/**
 * States of finished checks to differentiate better and worse results.
 */
enum CheckState: string
{
    /**
     * Meaning: This must be changed.
     */
    case FATAL = 'fatal';

    /**
     * Meaning: This should probably be changed.
     */
    case WARNING = 'warning';

    /**
     * Meaning: This is very situation-dependent or not very important.
     */
    case INFO = 'info';

    /**
     * Meaning: This is fine *drinking chocolate while everything burns*.
     */
    case SUCCESS = 'success';
}
