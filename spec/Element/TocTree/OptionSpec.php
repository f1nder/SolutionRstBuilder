<?php

namespace spec\Solution\RstBuilder\Element\TocTree;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\TocTree\Option');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }

    function it_should_support_name()
    {
        $this->setName('Title');
        $this->getName()->shouldReturn('Title');
    }

    function it_should_support_value()
    {
        $this->setValue('value');
        $this->getValue()->shouldReturn('value');
    }

    function it_should_render()
    {
        $this->setName('name');
        $this->setValue('value');

        $this->render()->shouldReturn(':name: value');
    }

    function it_should_render_without_value()
    {
        $this->setName('name');

        $this->render()->shouldReturn(':name:');
    }

}
