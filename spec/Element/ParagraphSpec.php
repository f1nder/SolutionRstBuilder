<?php

namespace spec\Solution\RstBuilder\Element;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParagraphSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\Paragraph');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }


    function it_should_render()
    {
        $this->beConstructedWith('Some text');

        $this->render()->shouldReturn(
            <<<EOT

Some text

EOT
        );
    }
}
