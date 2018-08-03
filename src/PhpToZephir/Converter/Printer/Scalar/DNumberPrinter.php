<?php
namespace PhpToZephir\Converter\Printer\Scalar;

use PhpParser\Node\Scalar;
use PhpToZephir\Converter\SimplePrinter;

class DNumberPrinter extends SimplePrinter
{
    /**
     * @return string
     */
    public static function getType()
    {
        return 'pScalar_DNumber';
    }

    /**
     * @param Scalar\DNumber $node
     *
     * @return string
     */
    public function convert(Scalar\DNumber $node)
    {
        if ($node->value == 0) {
            return '0.0';
        }

        return $node->value;
    }
}
