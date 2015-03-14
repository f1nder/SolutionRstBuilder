<?php

namespace spec\Solution\RstBuilder\Element\Method;

use PhpSpec\ObjectBehavior;
use Solution\RstBuilder\Element\Method\ParameterInterface;

class MethodSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\Method\Method');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }

    public function it_should_add_parameters(ParameterInterface $parameter1, ParameterInterface $parameter2)
    {
        $this->addParameter($parameter1);
        $this->addParameter($parameter2);

        $this->getParameters()->shouldHaveCount(2);
    }

    public function it_should_render(ParameterInterface $p1, ParameterInterface $p2)
    {
        $p1->getName()->willReturn('parameter1');
        $p1->getDesc()->willReturn('Some description parameter1');
        $p1->getType()->willReturn('string');

        $p2->getName()->willReturn('parameter2');
        $p2->getDesc()->willReturn('Some description parameter2');
        $p2->getType()->willReturn('string');

        $this->setName('method.name');
        $this->setDesc('Description of the method');
        $this->addParameter($p1);
        $this->addParameter($p2);
        $this->setReturn('Return string');

        $this->render()->shouldReturn(
            <<<EOT
.. method:: method.name(parameter1, parameter2)

   Description of the method

   :param parameter1: Some description parameter1
   :param parameter2: Some description parameter2
   :rtype: Return string
EOT
        );
    }

}
