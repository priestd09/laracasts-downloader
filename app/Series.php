<?php
namespace App;

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Series
{

    private $client;

    private $uri;

    private $config;

    private $options;


    public function __construct($uri)
    {
        if (!$uri) {
            return;
        }

        $this->uri = $uri;
        $this->client = new Client([
          'cookie'          => true,
          'allow_redirects' => false,
          'base_uri'        => 'https://laracasts.com',
        ]);
        $this->config = require 'config.php';
        $this->options = [
          'headers' => [
            'Accept'                    => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
            'Accept-Encoding'           => 'gzip, deflate, sdch',
            'Accept-Language'           => 'zh-CN,zh;q=0.8,en;q=0.6,ja;q=0.4,zh-TW;q=0.2',
            'Cache-Control'             => 'no-cache',
            'Connection'                => 'keep-alive',
            'Pragma'                    => 'no-cache',
            'Cookie'                    => $this->config['cookie'],
            'Upgrade-Insecure-Requests' => '1',
            'Referer'                   => "https://laracasts.com/",
            'User-Agent'                => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36',
          ],
          'proxy'   => $this->config['proxy'],
        ];

    }


    /**
     * @return string
     */
    public function getLessonCount()
    {
        $res = $this->get($this->uri);
        $crawler = new Crawler((string) $res->getBody());
        return $crawler->filter('ul.Banner__bullets > li > strong')
          ->first()
          ->text();

    }


    /**
     * @param $uri
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function get($uri)
    {
        return $this->client->get($uri, $this->options);
    }

    /**
     * @param $seriesUrl
     */
    public function run($seriesUrl)
    {
        $downloadUris = '';
        $lessonsCount = (int) $this->getLessonCount();
        for ($i = 1; $i <= $lessonsCount; $i++) {
            $downloadUris .= new VideoLink($seriesUrl . '/episodes/' . $i);
            if ($lessonsCount != $i) {
                $downloadUris .= "\n";
            }
        }

        file_put_contents($this->config['save_path'] . '/downloadUris.txt', $downloadUris);

        echo 'Saved to ' . $this->config['save_path'] . '/downloadUris.txt';
    }


}
