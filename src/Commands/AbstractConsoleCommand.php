<?php
/**
 * Created by PhpStorm.
 * User: Volokitin
 * Date: 13.02.2019
 * Time: 22:02
 */

namespace Crawler\Commands;

use Crawler\Exception\TooLittleFieldsException;

abstract class AbstractConsoleCommand
{
    /**
     * @var array
     */
    protected $arguments = [];
    /**
     * @var array
     */
    protected $requiredArguments = [];

    public function __construct(array $arguments)
    {
        $this->arguments = $arguments;
        $this->validate();
    }

    private function validate()
    {
        foreach ($this->requiredArguments as $argument) {
            if (!in_array($argument, array_keys($this->arguments))) {
                throw new TooLittleFieldsException("Missed required argument: " . $argument);
            }
        }
    }

    public abstract function execute();

}