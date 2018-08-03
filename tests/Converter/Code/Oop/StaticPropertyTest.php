<?php
namespace Converter\Code\Oop;

class StaticPropertyTest extends \ConverterBaseTest
{
    public function testConverting()
    {
        $php = <<<'EOT'
<?php
namespace Code\Oop;

class StaticProperty
{
    public static $x;

    public static function test1()
    {
        StaticProperty::$x = 1;
    }
}
EOT;
        $zephir = <<<'EOT'
namespace Code\Oop;

class StaticProperty
{
    public static x;
    public static function test1() -> void
    {
        let StaticProperty::x = 1;
    }

}
EOT;
        $this->assertConvertToZephir($php, $zephir);
    }
}
