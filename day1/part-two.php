<?php

declare(strict_types=1);

$input = file('input.txt');

$maxCalories = [0, 0, 0];
$currentSum = 0;

foreach ($input as $row) {
    if (strlen($row) > 1) {
        $currentSum += (int)$row;
    } else {
        sort($maxCalories);
        if ($currentSum > $maxCalories[0]) {
            $maxCalories[0] = $currentSum;
        }
        $currentSum = 0;
    }
}
 var_dump(array_sum($maxCalories));
