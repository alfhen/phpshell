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

        $parsedArguments = Alfhen\PhpShell\CliArgsParser::getArguments($requiredAguments);

        $this->assertEquals($expectedArguments, $parsedArguments);

    }
}