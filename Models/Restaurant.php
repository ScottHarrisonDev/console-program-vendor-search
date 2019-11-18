<?php

namespace Models;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Class Restaurant
 * @package Models
 */
class Restaurant
{

    /**
     * @var mixed|string
     */
    private $name;

    /**
     * @var false|string
     */
    private $location;

    /**
     * @var int|mixed
     */
    private $maxCovers;

    /**
     * @var array
     */
    private $meals = [];

    /**
     * Restaurant constructor.
     * @param array $details
     */
    function __construct(array $details)
    {
        $this->name = $details[0];
        $this->location = parseLocation($details[1]);
        $this->maxCovers = $details[2];
    }

    /**
     * @return mixed|string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return false|string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return int|mixed
     */
    public function getMaxCovers(): int
    {
        return $this->maxCovers;
    }

    /**
     * @return array
     */
    public function getMeals(): array
    {
        return $this->meals;
    }

    /**
     * @param Meal $meal
     */
    public function setMeal(Meal $meal): void
    {
        $this->meals[] = $meal;
    }

}