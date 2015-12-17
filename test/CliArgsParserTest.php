<?php

class CliArgsParserTest extends PHPUnit_Framework_TestCase
{
    public function testCliArgsParser() {

        $testArguments = [
            '--argument_one="one"',
            "--argument_two='two'",
        ];

        $_SERVER['argv'] = $testArguments;

        $expectedArguments = [
            'argument_one' => 'one',
            'argument_two' => 'two'
        ];

        $requiredAguments = ['argument_one', 'argument_two'];

        $argsParser = new Alfhen\PhpShell\CliArgsParser($requiredAguments);

        $parsedArguments = $argsParser->getArguments();

        $this->assertEquals($expectedArguments, $parsedArguments);

    }
}