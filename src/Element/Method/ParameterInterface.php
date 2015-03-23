<?php

namespace Solution\RstBuilder\Element\Method;

interface ParameterInterface
{
    public function render();

    public function renderArg();
}
