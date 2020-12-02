<?php

namespace AdventOfCode\DayTwo;

class PartTwo extends DayTwoSolution
{
    protected function isValidPassword(string $entry) : bool
    {
        preg_match("#^(?<positionOne>\d+)-(?<positionTwo>\d+)\ (?<requiredCharacter>\w):\ (?<storedPassword>\w+)$#", $entry, $matches);
        
        [
            'positionOne' => $positionOne,
            'positionTwo' => $positionTwo,
            'requiredCharacter' => $requiredCharacter,
            'storedPassword' => $storedPassword
        ] = $matches;

        $characterOne = $storedPassword[$positionOne - 1];
        $characterTwo = $storedPassword[$positionTwo - 1];

        $characterOneMatch = $characterOne === $requiredCharacter;
        $characterTwoMatch = $characterTwo === $requiredCharacter;
        $isNotSameCharacter = $characterOne !== $characterTwo;
        
        return ($characterOneMatch || $characterTwoMatch) && $isNotSameCharacter;
    }
}