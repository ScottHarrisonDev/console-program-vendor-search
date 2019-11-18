<?php
require __DIR__.'/vendor/autoload.php';

use Models\Search;
use Services\RestaurantParser;

// Get inputs as parsed structure
$search = new Search($argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);

// Get list of restaurants
$restaurants = RestaurantParser::parse($search->getInputFile());

// Remove any restaurants which are outside of input location
$nearbyRestaurants = array_filter($restaurants, function(\Models\Restaurant $restaurant) use ($search): bool {
    return $search->checkLocation($restaurant);
});

// Remove any restaurants which cannot handle amount of covers
$suitableSizedRestaurants = array_filter($nearbyRestaurants, function(\Models\Restaurant $restaurant) use ($search): bool {
    return $search->checkCovers($restaurant);
});

// Get list of meals which are available
$availableMeals = $search->checkMealTimes($suitableSizedRestaurants);

foreach($availableMeals as $meal) {
    echo $meal->getName() . ';' . $meal->getAllergens() . PHP_EOL;
}
exit;