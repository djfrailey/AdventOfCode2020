<?php

namespace AdventOfCode\DayOne;

use AdventOfCode\Types\PseudoSet;

class PartTwo extends DayOneSolution
{
    public function solve() : void
    {
        $entries = new PseudoSet(static::SOLUTION_INPUT);
        $solution = 0;
        
        foreach ($entries as $addendOne)
        {
            foreach ($entries->without($addendOne) as $addendTwo) {
                $sum = $addendOne + $addendTwo;
                $addendThree = 2020 - $sum;

                if ($entries->has($addendOne) && $entries->has($addendTwo) && $entries->has($addendThree)) {
                    $solution = $addendOne * $addendTwo * $addendThree;
                }
            }
        }

        echo "Answer: $solution" . PHP_EOL;
    }
}