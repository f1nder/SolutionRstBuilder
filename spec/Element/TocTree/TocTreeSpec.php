<?php

namespace spec\Solution\RstBuilder\Element\TocTree;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solution\RstBuilder\Element\TocTree\Entry;
use Solution\RstBuilder\Element\Option;

class TocTreeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\TocTree\TocTree');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }

    function it_should_support_option(Option $option)
    {
        $this->addOption($option);
        $this->addOption($option);

        $this->getOptions()->shouldHaveCount(2);
    }

    function it_should_support_entry(Entry $entry)
    {
        $this->addEntry($entry);
        $this->addEntry($entry);

        $this->getEntries()->shouldHaveCount(2);
    }


    function it_should_render(Option $option, Option $option2, Entry $entry, Entry $entry2)
    {

        $option->render()->willReturn(':option1:');
        $option2->render()->willReturn(':option2: value2');

        $entry->render()->willReturn('Title <target1>');
        $entry2->render()->willReturn('target2');

        $this->addOption($option);
        $this->addOption($option2);

        $this->addEntry($entry);
        $this->addEntry($entry2);

        $this->render()->shouldReturn(
            <<<EOT
.. toctree::
   :option1:
   :option2: value2

   Title <target1>
   target2
EOT
        );
    }


}
