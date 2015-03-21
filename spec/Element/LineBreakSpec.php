<?php

namespace spec\Solution\RstBuilder\Element;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LineBreakSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\LineBreak');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }


    function it_should_render(){
        $this->render()->shouldReturn(PHP_EOL);
    }
}
