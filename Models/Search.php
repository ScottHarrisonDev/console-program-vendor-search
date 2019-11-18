<?php

namespace Models;

require __DIR__ . '/../vendor/autoload.php';

use DateTime;

/**
 * Class Search
 * @package Models
 */
class Search
{

    /**
     * @var mixed|string
     */
    private $inputFile;

    /**
     * @var DateTime|false
     */
    private $deliveryDateTime;

    /**
     * @var false|string
     */
    private $location;

    /**
     * @var int|mixed
     */
    private $covers;

    /**
     * Search constructor.
     * @param array $arguments
     */
    function __construct(string $inputFile, string $day, string $time, string $location, string $covers)
    {
        $this->inputFile = $inputFile;
        $this->deliveryDateTime = parseDateTime($day, $time);
        $this->location = parseLocation($location);
        $this->covers = (int) $covers;
    }

    /**
     * @param Restaurant $restaurant
     * @return bool
     */
    public function checkLocation(Restaurant $restaurant): bool
    {
        return $restaurant->getLocation() === $this->location;
    }

    /**
     * @param Restaurant $restaurant
     * @return bool
     */
    public function checkCovers(Restaurant $restaurant): bool
    {
        return $restaurant->getMaxCovers() >= $this->covers;
    }

    /**
     * @param array $restaurants
     * @return array
     */
    public function checkMealTimes(array $restaurants): array
    {
        $suitableMeals = [];
        array_walk($restaurants, function (Restaurant $restaurant) use (&$suitableMeals): void {
            $suitableMeals = array_merge($suitableMeals, array_filter($restaurant->getMeals(), function(Meal $meal): bool {
                return $meal->getAdvanceTime()->getTimestamp() <= $this->deliveryDateTime->getTimestamp();
            }));
        });

        return $suitableMeals;
    }

    /**
     * @return mixed|string
     */
    public function getInputFile(): string
    {
        return $this->inputFile;
    }

}