<?php

namespace spec\Solution\RstBuilder\Element;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubTitleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\SubTitle');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }


    function it_should_render()
    {
        $this->beConstructedWith('Some title');

        $this->render()->shouldReturn(
            <<<EOT
Some title
----------
EOT
        );
    }
}
