<?php

namespace Brash\TypeCollection;

use Illuminate\Support\Collection;
use UnexpectedValueException;

/**
 * Class AbstractTypeCollection
 * @package Brash\TypeCollection
 */
abstract class AbstractTypeCollection extends Collection
{
    /**
     * AbstractTypeCollection constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        $items = $this->getArrayableItems($items);

        $this->validateValues($items);

        parent::__construct($items);
    }

    /**
     * @param array $items
     */
    private function validateValues(array $items)
    {
        foreach ($items as $item) {
            $this->validateValue($item);
        }
    }

    /**
     * @param $value
     */
    private function validateValue($value)
    {
        if (!$this->willAcceptType($value)) {
            throw new UnexpectedValueException(sprintf(
                "Invalid value passed to %s",
                get_class($this)
            ));
        }
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    final public function push($value)
    {
        $this->validateValue($value);

        return parent::push($value);
    }

    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return $this
     */
    final public function put($key, $value)
    {
        $this->validateValue($value);

        return parent::put($key, $value);
    }

    /**
     * @param $value
     *
     * @return bool
     */
    abstract protected function willAcceptType($value): bool;
}
