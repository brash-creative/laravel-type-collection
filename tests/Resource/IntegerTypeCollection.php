<?php

namespace Brash\TypeCollection\Tests\Resource;

use Brash\TypeCollection\AbstractTypeCollection;

class IntegerTypeCollection extends AbstractTypeCollection
{
    protected function willAcceptType($value): bool
    {
        return is_integer($value);
    }
}
