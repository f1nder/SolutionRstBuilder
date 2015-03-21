<?php

namespace spec\Solution\RstBuilder\Element\TocTree;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntrySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\TocTree\Entry');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }

    function it_should_support_title()
    {
        $this->setTitle('Title');
        $this->getTitle()->shouldReturn('Title');
    }

    function it_should_support_target()
    {
        $this->setTarget('target');
        $this->getTarget()->shouldReturn('target');
    }

    function it_should_render()
    {
        $this->setTitle('Title');
        $this->setTarget('target');
        $this->render()->shouldReturn('Title <target>');
    }

    function it_should_render_without_title()
    {
        $this->setTarget('target');
        $this->render()->shouldReturn('target');
    }

}
