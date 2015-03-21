<?php

namespace Solution\RstBuilder\Element;

class LineBreak implements ElementInterface
{
    /** @var integer */
    protected $number;

    public function __construct($number = 1)
    {
        $this->number = $number;
    }

    /**
     * Get Number
     *
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set Number
     *
     * @param mixed $number
     *
     * @return LineBreak
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function render()
    {
        return str_repeat(PHP_EOL, $this->getNumber());
    }
}
