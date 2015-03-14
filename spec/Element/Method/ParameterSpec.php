<?php

namespace spec\Solution\RstBuilder\Element\Method;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParameterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\Method\Parameter');
        $this->shouldHaveType('Solution\RstBuilder\Element\Method\ParameterInterface');
    }
}
