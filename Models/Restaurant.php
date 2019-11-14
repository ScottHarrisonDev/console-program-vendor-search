<?php

namespace foodFinder\Models;

class Restaurant
{

    public $name;

    public $location;

    public $maxCovers;

    public $meals = [];

    function __construct($details) {
        $this->name = $details[0];
        $this->location = parseLocation($details[1]);
        $this->maxCovers = $details[2];
    }

}