<?php
/**
 * Created by PhpStorm.
 * User: Volokitin
 * Date: 13.02.2019
 * Time: 21:28
 */

namespace Crawler;

use Crawler\Commands\AbstractConsoleCommand;

class Application
{
    /**
     * @var AbstractConsoleCommand[]
     */
    private $commands = [];


    /**
     * @param AbstractConsoleCommand $command
     */
    public function register(AbstractConsoleCommand $command)
    {
        $this->commands[] = $command;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    public function start() {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }

}