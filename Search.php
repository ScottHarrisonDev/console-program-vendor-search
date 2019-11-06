<?php

namespace foodFinder;

require './Helpers.php';

use DateTime;

class Search 
{

    public $inputFile;

    private $deliveryDateTime;

    private $location;

    private $covers;

    function __construct($arguments) {
        unset($arguments[0]); // The first argument is always the filename being called (in this case "foodFinder.php" which we do not need)

        $this->inputFile = $arguments[1];
        $this->deliveryDateTime = parseDateTime($arguments[2], $arguments[3]);
        $this->location = parseLocation($arguments[4]);
        $this->covers = $arguments[5];
    }

    public function checkLocation($restaurant) {
        return $restaurant->location === $this->location;
    }

    public function checkCovers($restaurant) {
        return $restaurant->maxCovers >= $this->covers;
    }

    public function checkMealTimes($restaurants) {
        $suitableMeals = [];
        foreach($restaurants as $restaurant) {
            foreach($restaurant->meals as $meal) {
                if ($meal->advanceTime->getTimestamp() <= $this->deliveryDateTime->getTimestamp()) {
                    $suitableMeals[] = $meal;
                }
            }
        }

        return $suitableMeals;
    }

}