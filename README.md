# phpshell
Tools for creating php shell scripts

## Installation

```
composer require alfhen/php-shell
```

## Usage

### CliArgsParser:

When creating a php shell script you can use the ```CliArgsParser``` to parse arguments passed to your shell scripts.
The parser expects arguments to be passed in following format --argument='<value>' note you should not write <> 
but just the raw value inside the quotes.
Each argument should be separated with a space.

``` php 

  // an array of the required argument keys, is not required
  $requiredAguments = ['argument_one', 'argument_two'];

  // get arguments as an associative array
  $parsedArguments = Alfhen\PhpShell\CliArgsParser::getArguments($requiredAguments);

```
### CliLogger:
CliLogger is a tool that helps you print nicely formated lines to the terminal/console. It comes with three built in types: 
Info, Error and Success. It can be used as such:

``` php 

Alfhen\PhpShell\CliLogger::info('This is an info message');

Alfhen\PhpShell\CliLogger::error('This is an error message');

Alfhen\PhpShell\CliLogger::success('This is a success message');


```



Happy coding and thanks for using the tools
