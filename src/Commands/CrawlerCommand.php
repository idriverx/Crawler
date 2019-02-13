<?php
/**
 * Created by PhpStorm.
 * User: Volokitin
 * Date: 13.02.2019
 * Time: 21:33
 */

namespace Crawler\Commands;

use Crawler\HttpClient;
use Crawler\WebsiteParser;

class CrawlerCommand extends AbstractConsoleCommand
{
    const WEBSITE_PARAMETER = 'website';
    protected $requiredArguments = [self::WEBSITE_PARAMETER];

    public function execute()
    {
        $client = new HttpClient($this->arguments[self::WEBSITE_PARAMETER]);
        $parser = new WebsiteParser($client, new \DOMDocument());
        $parser->findUrls();
    }
}