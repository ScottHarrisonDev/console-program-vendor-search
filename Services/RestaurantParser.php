<?php

namespace Services;

require __DIR__.'/../vendor/autoload.php';

use Models\Restaurant;
use Models\Meal;

class RestaurantParser
{
    
    public static function parse($filename) {
        $restaurants = [];

        $file = fopen($filename, "r");
        if ($file) {
            $currentRestaurant = null;
            while (($line = fgets($file)) !== false) {
                $line = trim($line); // trim to remove whitespace
                if (empty($line)){
                    $currentRestaurant = null;
                    continue;
                }
                if ($currentRestaurant === null) {
                    $currentRestaurant = new Restaurant(explode(';', $line));
                    $restaurants[$currentRestaurant->name] = $currentRestaurant;
                } else {
                    $restaurants[$currentRestaurant->name]->meals[] = new Meal(explode(';', $line));
                }
            }
            fclose($file);
        } else {
            throw new Exception("Input file could not be found.", 1);
        } 
        
        return $restaurants;
    }

}