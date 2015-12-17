# phpshell
Tools for creating php shell scripts

## Installation

```
composer require alfhen/php-shell
```

## Usage

When creating a php shell script you can use the ```CliArgsParser``` to parse arguments passed to your shell scripts.
The parser expects arguments to be passed in following format --argument='<value>' note you should not write <> 
but just the raw value inside the quotes.
Each argument should be separated with a space.

``` php 

  // an array of the required argument keys, is not required
  $requiredAguments = ['argument_one', 'argument_two'];

  // create an instance of arguments parser and pass required argument keys
  $argsParser = new Alfhen\PhpShell\CliArgsParser($requiredAguments);

  // get arguments as an associative array
  $parsedArguments = $argsParser->getArguments();

```
Happy coding and thanks for using the tools
