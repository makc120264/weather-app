<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class WeatherService
{
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $client;
    /**
     * @var mixed
     */
    private mixed $apiKey;
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param HttpClientInterface $client
     * @param LoggerInterface $logger
     */
    public function __construct(HttpClientInterface $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->apiKey = $_ENV['WEATHER_API_KEY'];
        $this->logger = $logger;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getWeatherData(string $city): array
    {
        $url = "https://api.weatherapi.com/v1/current.json?key={$this->apiKey}&q={$city}";
        try {
            $response = $this->client->request('GET', $url);
            $data = $response->toArray();

            if (isset($data['error'])) {
                return ['error' => $data['error']['message']];
            }

            $result = [
                'city' => $data['location']['name'],
                'country' => $data['location']['country'],
                'temperature' => $data['current']['temp_c'],
                'condition' => $data['current']['condition']['text'],
                'humidity' => $data['current']['humidity'],
                'wind_speed' => $data['current']['wind_kph'],
                'last_updated' => $data['current']['last_updated'],
            ];

            $this->logger->info("Weather data fetched for {$result['city']}");
            return $result;
        } catch (\Exception $e) {
            $this->logger->error('API request failed: ' . $e->getMessage());
            return ['error' => 'Unable to fetch weather data. Error: ' . $e->getMessage()];
        }
    }
}
