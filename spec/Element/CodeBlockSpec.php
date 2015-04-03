<?php

namespace spec\Solution\RstBuilder\Element;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solution\RstBuilder\Element\Option;

class CodeBlockSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\CodeBlock');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }

    function it_should_support_type()
    {
        $this->setType('type');
        $this->getType()->shouldReturn('type');
    }

    function it_should_support_option(Option $option)
    {
        $this->addOption($option);
        $this->getOptions()->shouldHaveCount(1);
    }

    public function it_should_render(Option $o)
    {
        $this->addOption($o);
        $o->render()->willReturn('option_render');

        $this->setType('type_code');
        $this->setContent(<<<EVBUFFER_EOF
{ "player": {
         "login": "player-login"
     },
     "currency": "USD",
     "balance": 100.55
}
EVBUFFER_EOF
);

        $this->render()->shouldReturn(
            <<<EOT
.. code-block:: type_code
   option_render

   { "player": {
            "login": "player-login"
        },
        "currency": "USD",
        "balance": 100.55
   }

EOT
           );
       }
}
