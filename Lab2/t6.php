<?php

function searchElement($array, $element)
{
    foreach ($array as $value) {
        if ($value === $element) {
            return true;
        }
    }
    return false;
}

// Example usage
$fruits = ["apple", "banana", "orange", "grape"];
$searchElement = "banana";

if (searchElement($fruits, $searchElement)) {
    echo "Element found! -> ". $searchElement;
} else {
    echo "Element not found.";
}

?>



