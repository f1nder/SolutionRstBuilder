<?php

namespace Solution\RstBuilder\Element;

interface ElementInterface
{
    /**
     * Render element to a string
     *
     * @return string
     */
    public function render();
}
