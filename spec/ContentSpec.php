<?php

namespace spec\Solution\RstBuilder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solution\RstBuilder\Element\ElementInterface;

class ContentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Content');
    }

    function it_should_collect_elements(ElementInterface $element1, ElementInterface $element2)
    {
        $this->addElement($element1);
        $this->addElement($element2);

        $this->getElements()->shouldHaveCount(2);
    }

    function it_should_return_content(ElementInterface $element1)
    {
        $element1
            ->render()
            ->willReturn('string')
            ->shouldBeCalled();

        $this->addElement($element1);

        $this->getContent()->shouldReturn('string');
    }
}
