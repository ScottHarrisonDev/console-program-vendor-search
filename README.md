# Food Finder Console Application
This console application is designed to search through a list of restaurants and find suitable restaurants based upon criteria such as location, covers and lead time.

It outputs a list of available meals for a given input.

## Install
1. Ensure you have PHP installed locally
2. Ensure you have the repository checked out locally

## Usage
Note: `foodFinder.php` is the entrypoint for this console application so you will need to run any commands on this file.

Syntax:
`php foodFinder.php [(string) File path to restaurant list] [(string) Date of delivery] [(string) Time of delivery] [(string) Postcode for delivery with no spaces] [(int) 9Headcount]`

Examples:
`php foodFinder.php "./example-input" "07/11/19" "15:00" "NW32QP" 20`
`php foodFinder.php "./example-input" "08/11/19" "15:00" "SW32NY" 10`

If no restaurants or meals are found suitable, nothing will be returned.

## Manual testing
Below are some examples that have been manually checked and confirmed to work as expected.

### Test 1
Ran at 23:38 06/11/2019

`php foodFinder.php "./example-input" "07/11/19" "15:00" "NW32QP" 20`

Returns

`Breakfast;gluten,eggs`

### Test 2
Ran at 23:39 06/11/2019

`php foodFinder.php "./example-input" "08/11/19" "15:00" "SW32NY" 10`

Returns

`The Classic;gluten`

### Test 3
Ran at 23:40 06/11/2019

`php foodFinder.php "./example-input" "27/11/19" "15:00" "EC1A9DE" 10`

Returns

`Full English breakfast;gluten`