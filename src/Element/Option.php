<?php

namespace Solution\RstBuilder\Element;

/**
 * Class Option
 * @package Solution\RstBuilder\Element\TocTree
 */
class Option implements ElementInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * Get Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param mixed $name
     *
     * @return Option
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set Value
     *
     * @param mixed $value
     *
     * @return Option
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Render element to a string
     *
     * @return string
     */
    public function render()
    {
        if ($this->getValue()) {
            return sprintf(':%s: %s', $this->getName(), $this->getValue());
        }

        return sprintf(':%s:', $this->getName());
    }
}
