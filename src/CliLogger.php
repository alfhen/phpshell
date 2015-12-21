<?php

namespace Alfhen\PhpShell;

class CliLogger
{
    const CLI_COLOR_RED = "\033[31m";
    const CLI_COLOR_GREEN = "\033[32m";
    const CLI_COLOR_DEFAULT = "\033[0m";
    const CLI_TYPE_ERROR = 'Error';
    const CLI_TYPE_INFO = 'Info';
    const CLI_TYPE_SUCCESS = 'Success';

    /**
     * Write a message of type Error to terminal
     *
     * @param string $message
     */
    public static function error($message = '') {
        self::writeLine($message, SELF::CLI_COLOR_RED, self::CLI_TYPE_ERROR);
    }

    /**
     * Write a message of type info to terminal
     *
     * @param string $message
     */
    public static function info($message = '') {
        self::writeLine($message, SELF::CLI_COLOR_DEFAULT, self::CLI_TYPE_ERROR);
    }

    /**
     * Write a message of type success to terminal
     *
     * @param string $message
     */
    public static function success($message = '') {
        self::writeLine($message, SELF::CLI_COLOR_GREEN, self::CLI_TYPE_ERROR);
    }

    /**
     * Write a line to termnial/console with provided params
     *
     * @param $message
     * @param string $color
     * @param string $type
     */
    private static function writeLine($message, $color = self::CLI_COLOR_DEFAULT, $type = self::CLI_TYPE_INFO) {
        $defaultColor = self::CLI_COLOR_DEFAULT;
        echo "$color $type:$defaultColor $message\n";
    }
}