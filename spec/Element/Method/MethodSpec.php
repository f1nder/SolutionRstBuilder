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
        $p1->render()->willReturn('renderParam1');
        $p1->renderArg()->willReturn('renderArg1');

        $p2->render()->willReturn('renderParam2');
        $p2->renderArg()->willReturn('renderArg2');

        $this->setName('method.name');
        $this->setDesc('Description of the method');
        $this->addParameter($p1);
        $this->addParameter($p2);
        $this->setReturn('Return string');

        $this->render()->shouldReturn(
            <<<EOT
.. method:: method.name(renderArg1, renderArg2)

   Description of the method

   renderParam1
   renderParam2
   :return: Return string
EOT
        );
    }

}
