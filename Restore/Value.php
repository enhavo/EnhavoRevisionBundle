<?php

namespace Enhavo\Bundle\RevisionBundle\Restore;

class Value
{
    private mixed $value = null;

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setValue(mixed $value): void
    {
        $this->value = $value;
    }
}
