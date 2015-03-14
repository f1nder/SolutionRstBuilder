<?php

namespace Solution\RstBuilder\Element\Method;

use Solution\RstBuilder\Element\ElementInterface;

class Method implements ElementInterface
{
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
   :rtype: %s
EOT;

        return sprintf(
            $template,
            $this->getName(),
            $this->renderParameters(),
            $this->getDesc(),
            $this->renderDescParameters(),
            $this->getReturn()
        );
    }

    private function renderParameters()
    {
        $params = array_map(
            function (ParameterInterface $parameter) {
                return $parameter->getName();
            },
            $this->parameters
        );

        return implode(', ', $params);
    }

    private function renderDescParameters()
    {
        $params = array_map(
            function (ParameterInterface $parameter) {
                return sprintf('   :param %s: %s', $parameter->getName(), $parameter->getDesc());
            },
            $this->parameters
        );

        return implode(PHP_EOL, $params);
    }
}
