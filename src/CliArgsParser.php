<?php

namespace Alfhen\PhpShell;

use Alfhen\PhpShell\Errors\MissingArgumentError;
use Alfhen\PhpShell\Errors\ParseArgumentError;
use Exception;

class CliArgsParser
{
    private $unparsedArguments = null;
    private $parsedArguments = null;
    private $requiredArguments = null;

    /**
     * CliArgsParser parses cli arguments passed in; --agurment=<value> format.
     *
     * @param array $requiredArguments optional required argument keys
     * @throws ParseArgumentError
     */
    public function __construct(array $requiredArguments = []) {

        if(!isset($_SERVER['argv'])) {
            throw new ParseArgumentError('Cannnot parse aguments; argv is not set');
        }else{
            $this->unparsedArguments = $_SERVER['argv'];
            if(count($requiredArguments)) {
                $this->requiredArguments = $requiredArguments;
            }
        }
    }


    /**
     * Get parsed cli arguments
     *
     * @return array|null
     */
    public function getArguments() {
        if(is_null($this->parsedArguments)) {
            return $this->parseArguments();
        }
        return $this->parsedArguments;
    }


    /**
     * Validate that required params exist
     * @return bool
     * @throws MissingArgumentError
     */
    private function validateRequiredArguments() {

        if(!is_null($this->requiredArguments)) {
            foreach($this->requiredArguments as $requiredArgument) {
                if(!isset($this->parsedArguments[$requiredArgument])) {
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
     * @return array|null
     * @throws Exception
     */
    private function parseArguments() {

        if(!empty($this->unparsedArguments) && count($this->unparsedArguments) > 1 ) {
            $this->parsedArguments = [];
            foreach ($this->unparsedArguments as $unparsedArgument) {
                if(strpos($unparsedArgument, '--') !== false) {
                    $parsedAgument = explode('=', trim($unparsedArgument, '--'));
                    $this->parsedArguments[$parsedAgument[0]] = trim(
                                                                    trim(
                                                                        $parsedAgument[1],
                                                                        '"'
                                                                    ),
                                                                    "'"
                                                                );
                }
            }
        }
        $this->validateRequiredArguments();
        return $this->parsedArguments;
    }
}