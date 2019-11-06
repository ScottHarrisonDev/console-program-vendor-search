# Food Finder Console Application
This console application is designed to search through a list of restaurants and find suitable restaurants based upon criteria such as location, covers and lead time.

It outputs a list of available meals for a given input.

## Install
1. Ensure you have PHP installed locally
2. Ensure you have the repository checked out locally

## Usage
Note: `foodFinder.php` is the entrypoint for this console application so you will need to run any commands on this file.

Syntax:
`php foodFinder.php [File path to restaurant list] [Date of delivery] [Time of delivery] [Postcode for delivery with no spaces] [Headcount]`

Examples:
`php foodFinder.php "./example-input" "07/11/19" "15:00" "NW32QP" 20`
`php foodFinder.php "./example-input" "08/11/19" "15:00" "SW32NY" 10`