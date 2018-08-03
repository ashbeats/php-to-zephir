<?php
namespace PhpToZephir\Converter\Printer\Scalar\MagicConst;

use PhpParser\Node\Scalar\MagicConst;
use PhpToZephir\Converter\SimplePrinter;

class MethodPrinter extends SimplePrinter
{
    public static function getType()
    {
        return 'pScalar_MagicConst_Method';
    }

    public function convert(MagicConst\Method $node)
    {
        return '__METHOD__';
    }
}
