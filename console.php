<?php
/**
 * Created by PhpStorm.
 * User: Volokitin
 * Date: 13.02.2019
 * Time: 21:27
 */

use Crawler\Application;
use Crawler\ArgumentParser;
use Crawler\Commands\CrawlerCommand;

require __DIR__ . '/vendor/autoload.php';

$application = new Application();
$parser = new ArgumentParser($argv);
$arguments = $parser->parse();
$application->register(new CrawlerCommand($arguments));
$application->start();