<?php

namespace AdventOfCode\DayOne;

use AdventOfCode\Types\PseudoSet;

class AddendFinder
{
    public function find(int $sum, array $input) : ?array
    {
        $entries = new PseudoSet($input);

        foreach ($entries as $entry)
        {
            $difference = $sum - $entry;

            if ($entries->has($difference)) {
                return sort([
                    $entry,
                    $difference
                ]);
            }
        }

        return null;
    }
}