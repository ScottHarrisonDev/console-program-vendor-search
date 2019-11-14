<?php

namespace foodFinder\Models;

require './Helpers.php';

class Meal
{

    public $name;

    public $allergens;

    public $advanceTime;

    // Here we are assuming that the meal has 3 components which are all mandatory and in the same order every time.
    // After looking into the example file, I see no reason to believe this is not a reliable format so this would be a safe assumption based on the information given
    function __construct($details) {
        $this->name = $details[0];
        $this->allergens = $details[1];
        $this->advanceTime = parseTimeString($details[2]);
    }

}