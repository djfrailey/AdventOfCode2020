<?php

namespace AdventOfCode\Types;

use Traversable;
use ArrayIterator;
use IteratorAggregate;

class PseudoSet implements IteratorAggregate
{
    protected $keys = [];
    protected $values = [];

    public function __construct(array $elements = [])
    {
        foreach ($elements as $element)
        {
            $this->add($element);
        }
    }

    public function add($element) : void
    {
        $this->keys[$element] = count($this->keys);
        $this->values = array_keys($this->keys);
    }

    public function remove($element) : void
    {
        unset($this->values[$this->keys[$element]]);
        unset($this->keys[$element]);
    }

    public function has($element) : bool
    {
        return isset($this->keys[$element]);
    }

    public function reduce(callable $mapFunc)
    {
        return array_reduce($this->values, $mapFunc, $this->values ?? null);
    }

    public function without($element) : self
    {
        $copy = new static($this->values);
        $copy->remove($element);
        return $copy;
    }

    public function getIterator() : Traversable
    {
        return new ArrayIterator($this->values);
    }

    public function toArray() : array
    {
        return $this->values;
    }
}