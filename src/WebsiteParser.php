<?php
/**
 * Created by PhpStorm.
 * User: Volokitin
 * Date: 13.02.2019
 * Time: 22:40
 */

namespace Crawler;


class WebsiteParser
{
    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * @var \DOMDocument
     */
    protected $document;

    public function __construct(HttpClient $client, \DOMDocument $document)
    {
        $this->client = $client;
        $this->document = $document;
        $this->document->loadHTML($this->getHTML());
    }

    /**
     * @return string
     */
    protected function getHTML(): string
    {
        return $this->client->execute() ?: '';
    }

    /**
     * @return int
     */
    public function findCountImages(): int
    {
        $images = $this->document->getElementsByTagName('img')->length;
        return $images;
    }

    public function findUrls(): array
    {
        $urls = $this->document->getElementsByTagName('a');
        foreach ($urls as $url) {
            echo 1;
        }
    }
}