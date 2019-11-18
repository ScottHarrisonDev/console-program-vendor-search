<?php

namespace Models;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Class Meal
 * @package Models
 */
class Meal
{

    /**
     * @var mixed|string
     */
    private $name;

    /**
     * @var mixed|string
     */
    private $allergens;

    /**
     * @var \DateTime|false|DateTime
     */
    private $advanceTime;

    // Here we are assuming that the meal has 3 components which are all mandatory and in the same order every time.
    // After looking into the example file, I see no reason to believe this is not a reliable format so this would be a safe assumption based on the information given
    /**
     * Meal constructor.
     * @param array $details
     */
    function __construct(array $details)
    {
        $this->name = $details[0];
        $this->allergens = $details[1];
        $this->advanceTime = parseTimeString($details[2]);
    }

    /**
     * @return mixed|string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed|string
     */
    public function getAllergens(): string
    {
        return $this->allergens;
    }

    /**
     * @return \DateTime|false|DateTime
     */
    public function getAdvanceTime(): \DateTime
    {
        return $this->advanceTime;
    }


}