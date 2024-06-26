<?php

namespace Hexafuchs\Audit\Helper;

class IniConverter
{
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
