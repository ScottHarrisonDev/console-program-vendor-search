<?php

require './Search.php';
require './RestaurantParser.php';

use foodFinder\Search;
use foodFinder\RestaurantParser;

// Get inputs as parsed structure
$search = new Search($argv);

// Get list of restaurants
$restaurants = RestaurantParser::parse($search->inputFile);

// Remove any restaurants which are outside of input location
$nearbyRestaurants = array_filter($restaurants, function($restaurant) use ($search) {
    return $search->checkLocation($restaurant);
});

// Remove any restaurants which cannot handle amount of covers
$suitableSizedRestaurants = array_filter($nearbyRestaurants, function($restaurant) use ($search) {
    return $search->checkCovers($restaurant);
});

// Get list of meals which are available
$availableMeals = $search->checkMealTimes($suitableSizedRestaurants);

foreach($availableMeals as $meal) {
    echo $meal->name . ';' . $meal->allergens . PHP_EOL;
}
exit;