<?php

namespace spec\Solution\RstBuilder\Element\Method;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solution\RstBuilder\Element\Method\Parameter;

class ParameterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Solution\RstBuilder\Element\Method\Parameter');
        $this->shouldHaveType('Solution\RstBuilder\Element\Method\ParameterInterface');
        $this->shouldHaveType('Solution\RstBuilder\Element\ElementInterface');
    }


    function it_should_render(){
        $this->setName('parameter1');
        $this->setDesc('Description for parameter 1');
        $this->setType(Parameter::TYPE_INTEGER);
        $this->setRequired(true);

        $this->render()->shouldReturn(':param int parameter1: Description for parameter 1');
    }

    function it_should_type_null(){
        $this->setName('parameter1');
        $this->setDesc('Description for parameter 1');
        $this->setRequired(true);

        $this->render()->shouldReturn(':param  parameter1: Description for parameter 1');
    }

    function it_should_render_arg(){
        $this->setName('parameter1');
        $this->setDesc('Description for parameter 1');
        $this->setType(Parameter::TYPE_INTEGER);
        $this->setRequired(true);

        $this->renderArg()->shouldReturn('parameter1');
    }

    function it_should_render_arg_not_required(){
        $this->setName('parameter1');
        $this->setDesc('Description for parameter 1');
        $this->setType(Parameter::TYPE_INTEGER);
        $this->setRequired(false);
        $this->setDefault(5);

        $this->renderArg()->shouldReturn('[parameter1=5]');
    }
}
