<?php

namespace Services;

require __DIR__.'/../vendor/autoload.php';

use Models\Restaurant;
use Models\Meal;

/**
 * Class RestaurantParser
 * @package Services
 */
class RestaurantParser
{

    /**
     * @param string $filename
     * @return array
     */
    public static function parse(string $filename): array {
        $restaurants = [];

        $file = fopen($filename, "r");
        if (! $file) {
            throw new Exception("Input file could not be found.", 1);
        }
        $currentRestaurant = null;
        while (($line = fgets($file)) !== false) {
            $line = trim($line); // trim to remove whitespace
            if (empty($line)){
                $currentRestaurant = null;
                continue;
            }
            if ($currentRestaurant === null) {
                $currentRestaurant = new Restaurant(explode(';', $line));
                $restaurants[$currentRestaurant->getName()] = $currentRestaurant;
            } else {
                $restaurants[$currentRestaurant->getName()]->setMeal(new Meal(explode(';', $line)));
            }
        }
        fclose($file);
        
        return $restaurants;
    }

}