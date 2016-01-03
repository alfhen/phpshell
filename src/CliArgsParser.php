<?php

namespace Alfhen\PhpShell;

use Alfhen\PhpShell\Errors\MissingArgumentError;
use Alfhen\PhpShell\Errors\ParseArgumentError;
use Exception;

class CliArgsParser
{
    /**
     * Get parsed cli arguments, CliArgsParser parses cli arguments passed in; --agurment=<value> format.
     *
     * @param array $requiredArguments optional array of requeired argument keys
     * @return array|null
     * @throws ParseArgumentError
     */
    public static function getArguments(array $requiredArguments = []) {
        return self::parseArguments($requiredArguments);
    }

    /**
     * Validate that required params exist
     * @param $requiredArguments
     * @param $arguments
     * @return bool
     * @throws MissingArgumentError
     */
    private static function validateRequiredArguments($requiredArguments, $arguments) {

        if(count($requiredArguments)) {
            foreach($requiredArguments as $requiredArgument) {
                if(!isset($arguments[$requiredArgument])) {
                    throw new MissingArgumentError(
                        "Misssing required argument:
                         '$requiredArgument' please provide in
                          --$requiredArgument=<value> format
                         ");
                }
            }
        }
        return true;
    }

    /**
     * Parses unparsedAguments
     *
     * @param $requiredArguments
     * @return array|null
     * @throws MissingArgumentError
     * @throws ParseArgumentError
     */
    private static function parseArguments($requiredArguments) {

        if(!isset($_SERVER['argv'])) {
            throw new ParseArgumentError('Cannnot parse aguments; argv is not set');
        }
        $unparsedArguments = $_SERVER['argv'];
        $parsedArguments = [];

        if(!empty($unparsedArguments) && count($unparsedArguments) > 1 ) {
            foreach ($unparsedArguments as $unparsedArgument) {
                if(strpos($unparsedArgument, '--') !== false) {
                    $parsedAgument = explode('=', trim($unparsedArgument, '--'));
                    $parsedArguments[$parsedAgument[0]] = trim(
                                                                    trim(
                                                                        $parsedAgument[1],
                                                                        '"'
                                                                    ),
                                                                    "'"
                                                                );
                }
            }
        }
        self::validateRequiredArguments($requiredArguments, $parsedArguments);
        return $parsedArguments;
    }
}