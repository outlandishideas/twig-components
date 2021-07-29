<?php

namespace Performing\TwigComponents;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ComponentExtension extends AbstractExtension
{
    /**
     * @var string
     */
    private $relativePath;

    public function __construct(string $relativePath)
    {
        $this->relativePath = rtrim($relativePath, DIRECTORY_SEPARATOR);
    }

    public function getTokenParsers()
    {
        return [
            new ComponentTokenParser($this->relativePath),
            new SlotTokenParser(),
        ];
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('inherited', [ComponentTwigFunctions::class, 'getInherited'], ['needs_context' => true])
        ];
    }
}
