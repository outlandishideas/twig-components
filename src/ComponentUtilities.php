<?php

namespace Performing\TwigComponents;

class ComponentUtilities
{
    public static function getInherited($context, $name, $default = null)
    {
        if (isset($context[$name])) {
            return $context[$name];
        }
        if (isset($context['_inherited'])) {
            return self::getInherited($context['_inherited'], $name, $default);
        }
        return $default;
    }

    public static function camelCaseKeys($array)
    {
        if (!is_array($array)) {
            return $array;
        }
        $camelCase = [];
        foreach ($array as $key => $value) {
            $camelCaseKey = lcfirst(implode('', array_map('ucwords', explode('-', $key))));
            $camelCase[$key] = $value;
            $camelCase[$camelCaseKey] = $value;
        }
        return $camelCase;
    }
}