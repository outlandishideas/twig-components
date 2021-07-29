<?php

namespace Performing\TwigComponents;

class ComponentTwigFunctions
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
}