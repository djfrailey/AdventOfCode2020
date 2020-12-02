<?php

namespace AdventOfCode\DayTwo;

class PartOne extends DayTwoSolution
{
    protected function isValidPassword(string $entry) : bool
    {
        preg_match("#^(?<min>\d+)-(?<max>\d+)\ (?<requiredCharacter>\w):\ (?<storedPassword>\w+)$#", $entry, $matches);
        
        [
            'min' => $min,
            'max' => $max,
            'requiredCharacter' => $requiredCharacter,
            'storedPassword' => $storedPassword
        ] = $matches;

        $characterCount = substr_count($storedPassword, $requiredCharacter);
        return $min <= $characterCount && $max >= $characterCount;
    }
}