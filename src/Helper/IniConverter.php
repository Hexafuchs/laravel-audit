<?php

namespace Hexafuchs\Audit\Helper;

/**
 * Converts ini values to php values.
 */
class IniConverter
{
    /**
     * Retrieves an ini key and converts it into a php value.
     *
     * The value is retrieved using {@see ini_get()}.
     *
     * If the value does not exist, null is returned.
     *
     * If the value is numeric, an int is returned.
     *
     * If the value is 1, on, yes, or true, then true is returned. Case-insensitive.
     *
     * If the value is 0, off, no, or false, then false is returned. Case-insensitive.
     *
     * Otherwise, the value is returned as string.
     */
    public static function convertValue(string $key): string|int|bool|null
    {
        $value = ini_get($key);

        if ($value === false) {
            return null;
        }

        if (is_numeric($value)) {
            return intval($value);
        }

        if (in_array(strtolower($value), ['1', 'on', 'yes', 'true'])) {
            return true;
        }

        if (in_array(strtolower($value), ['0', 'off', 'no', 'false'])) {
            return false;
        }

        return $value;
    }
}
