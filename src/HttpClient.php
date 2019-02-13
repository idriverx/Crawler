<?php
/**
 * Created by PhpStorm.
 * User: Volokitin
 * Date: 13.02.2019
 * Time: 22:28
 */

namespace Crawler;

class HttpClient
{
    /**
     * @var resource
     */
    private $ch;

    public function __construct(string $url)
    {
        $this->ch = curl_init();
        curl_setopt_array($this->ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_AUTOREFERER    => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_URL            => $url
        ]);
    }

    public function execute()
    {
        return curl_exec($this->ch);
    }

    public function close()
    {
        curl_close($this->ch);
    }
}