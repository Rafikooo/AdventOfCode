<?php

declare(strict_types=1);

$input = file('input.txt');

$maxCalories = 0;
$currentSum = 0;

foreach ($input as $row) {
    if (strlen($row) > 1) {
        $currentSum += (int)$row;
        var_dump($currentSum);
    } else {
        if ($currentSum > $maxCalories) {
            $maxCalories = $currentSum;
        }
        $currentSum = 0;
    }
}
 echo $maxCalories;
