<?php
/**
 * Created by PhpStorm.
 * User: Volokitin
 * Date: 13.02.2019
 * Time: 21:47
 */

namespace Crawler;

class ArgumentParser
{
    const CONSOLE_DELIMITER = '=';
    const START_PARAMETER_WITH = '--';

    private $arguments;

    public function __construct(array $args)
    {
        $this->arguments = $args;
    }

    /**
     * Returns array in key-pair arguments. For example:
     * [website => volokitin.com]
     *
     * @return array
     */
    public function parse(): array
    {
        unset($this->arguments[0]);
        $keyPairParams = [];
        foreach ($this->arguments as $argument) {
            $arguments = explode(self::CONSOLE_DELIMITER, strip_tags($argument));
            $parameterName = ltrim(reset($arguments), self::START_PARAMETER_WITH);
            $parameterValue = end($arguments);
            $keyPairParams[$parameterName] = $parameterValue;
        }
        return $keyPairParams;
    }
}