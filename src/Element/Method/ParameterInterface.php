<?php

namespace Solution\RstBuilder\Element\Method;

interface ParameterInterface
{
    public function getName();

    public function getType();

    public function getDesc();
}