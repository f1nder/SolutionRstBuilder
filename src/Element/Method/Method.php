<?php

namespace Solution\RstBuilder\Element\Method;

use Solution\RstBuilder\Element\CommonHelper;
use Solution\RstBuilder\Element\ElementInterface;

class Method implements ElementInterface
{
    use CommonHelper;

    protected $name;

    protected $desc;

    protected $parameters = [];

    protected $return;

    /**
     * Get Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param mixed $name
     *
     * @return Method
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Desc
     *
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set Desc
     *
     * @param mixed $desc
     *
     * @return Method
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get Return
     *
     * @return mixed
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * Set Return
     *
     * @param mixed $return
     *
     * @return Method
     */
    public function setReturn($return)
    {
        $this->return = $return;

        return $this;
    }

    public function addParameter(ParameterInterface $parameter)
    {
        $this->parameters[] = $parameter;

        return $this;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $template = <<<EOT
.. method:: %s(%s)

   %s

%s
   :return: %s
EOT;

        return sprintf(
            $template,
            $this->getName(),
            $this->glueElements(
                $this->getParameters(),
                function (ParameterInterface $element) {
                    return $element->renderArg();
                },
                ', '
            ),
            $this->getDesc(),
            $this->glueElements(
                $this->getParameters(),
                function (ParameterInterface $element) {
                    return $element->render();
                },
                PHP_EOL,
                str_repeat(' ', 3)
            ),
            $this->getReturn()
        );
    }
}
