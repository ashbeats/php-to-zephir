<?php
namespace Converter\Code\Condition\IfStmt;

class IfWithCreateTmpVarInConditionTest extends \ConverterBaseTest
{
    public function testConverting()
    {
       $php = <<<'EOT'
<?php
namespace Code\Condition\IfStmt;

class IfWithCreateTmpVarInCondition
{
    public function test($toto)
    {
        if (array() == $toto) {
            echo 'tata';
        }

        if ("im a string" == $toto) {
            echo 'tata';
        }

        if (false == $toto) {
            echo 'tata';
        }

        if ($toto === true && $toto === array(10)) {
            echo 'tata';
        }

        if ($toto === true && $toto === array() || $toto === false) {
            echo 'tata';
        }

        if ($toto === true && $toto === array() || $toto === false && $toto === true) {
            echo 'tata';
        }
    }
}
EOT;
        $zephir = <<<'EOT'
namespace Code\Condition\IfStmt;

class IfWithCreateTmpVarInCondition
{
    public function test(toto) -> void
    {
        var tmpArray40cd750bba9870f18aada2478b24840a, tmpArrayf2ca4b16a4d8a754fb08192031cfb1b4;
    
        let tmpArray40cd750bba9870f18aada2478b24840a = [];
        if toto == tmpArray40cd750bba9870f18aada2478b24840a {
            echo "tata";
        }
        if toto == "im a string" {
            echo "tata";
        }
        if toto == false {
            echo "tata";
        }
        let tmpArrayf2ca4b16a4d8a754fb08192031cfb1b4 = [10];
        if toto === true && toto === tmpArrayf2ca4b16a4d8a754fb08192031cfb1b4 {
            echo "tata";
        }
        let tmpArray40cd750bba9870f18aada2478b24840a = [];
        if toto === true && toto === tmpArray40cd750bba9870f18aada2478b24840a || toto === false {
            echo "tata";
        }
        let tmpArray40cd750bba9870f18aada2478b24840a = [];
        if toto === true && toto === tmpArray40cd750bba9870f18aada2478b24840a || toto === false && toto === true {
            echo "tata";
        }
    }

}
EOT;
        $this->assertConvertToZephir($php, $zephir);
    }
}
