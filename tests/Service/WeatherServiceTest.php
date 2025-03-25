<?php

namespace App\Tests\Service;

use App\Service\WeatherService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class WeatherServiceTest extends KernelTestCase
{
    private static ContainerInterface $container;

    public static function setUpBeforeClass(): void
    {
        self::$container = self::bootKernel()->getContainer();
    }

    /**
     * @return void
     */
    public function testGetWeatherData()
    {
        $weatherService = self::$container->get(WeatherService::class);
        $weatherData = $weatherService->getWeatherData('London');

        $this->assertArrayHasKey('city', $weatherData);
        $this->assertArrayHasKey('temperature', $weatherData);
    }
}
