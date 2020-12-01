<?php

namespace AdventOfCode\DayOne;

class PartOne extends DayOneSolution
{
    public function solve() : void
    {
        $addends = $this->addendFinder->find(2020, static::SOLUTION_INPUT);
        $solution = array_reduce($addends, fn($total, $next) => $total > 0 ? $total * $next : $next, 0);
        echo "Answer: $solution" . PHP_EOL;
    }
}