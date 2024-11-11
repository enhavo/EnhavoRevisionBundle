<?php

namespace Enhavo\Bundle\RevisionBundle\Restore\Metadata;

class Metadata extends \Enhavo\Component\Metadata\Metadata
{
    private array $properties = [];
    private array $class = [];

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    public function getClass(): array
    {
        return $this->class;
    }

    public function setClass(array $class): void
    {
        $this->class = $class;
    }
}
