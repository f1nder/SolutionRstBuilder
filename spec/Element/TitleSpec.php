<?php

namespace spec\Solution\RstBuilder\Element;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TitleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\Title');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }


    function it_should_render()
    {
        $this->beConstructedWith('Some title');

        $this->render()->shouldReturn(
            <<<EOT
==========
Some title
==========
EOT
        );
    }

    function it_title_should_be_mutable()
    {
        $this->setTitle('New title');
        $this->getTitle()->shouldReturn('New title');
    }
}
