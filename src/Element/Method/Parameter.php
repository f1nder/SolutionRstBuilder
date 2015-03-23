<?php

namespace Solution\RstBuilder\Element\Method;

use Solution\RstBuilder\Element\ElementInterface;

class Parameter implements ParameterInterface, ElementInterface
{
    const TYPE_INTEGER = 'integer';
    const TYPE_STRING = 'string';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_FLOAT = 'float';

    protected $name;

    protected $type;

    protected $desc;

    protected $required;

    protected $default;

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
     * @return Parameter
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Type
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type
     *
     * @param mixed $type
     *
     * @return Parameter
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * @return Parameter
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get Required
     *
     * @return mixed
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * Set Required
     *
     * @param mixed $required
     *
     * @return Parameter
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get Default
     *
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set Default
     *
     * @param mixed $default
     *
     * @return Parameter
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Render element to a string
     *
     * @return string
     */
    public function render()
    {
        return sprintf(
            ':param %s %s: %s',
            $this->renderType(),
            $this->getName(),
            $this->getDesc()
        );
    }

    public function renderArg()
    {
        if ($this->isRequired()) {
            return $this->getName();
        } else {
            return sprintf('[%s=%s]', $this->getName(), $this->getDefault());
        }
    }

    protected function renderType()
    {
        switch ($this->getType()) {
            case self::TYPE_INTEGER:
                return 'int';
            case self::TYPE_STRING:
                return 'str';
            case self::TYPE_BOOLEAN:
                return 'boolean';
            case self::TYPE_FLOAT:
                return 'float';
            default:
                return null;
        }
    }
}
