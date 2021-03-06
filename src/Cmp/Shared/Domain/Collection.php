<?php


namespace Cmp\Shared\Domain;

use ArrayIterator;
use Countable;
use IteratorAggregate;


abstract class Collection implements Countable, IteratorAggregate
{
    private $items;

    public function __construct(array $items)
    {
        Assert::arrayOf($this->type(), $items);

        $this->items = $items;
    }

    abstract protected function type(): string;

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items());
    }

    public function count(): int
    {
        return count($this->items());
    }

    public function items(): array
    {
        return $this->items;
    }
}