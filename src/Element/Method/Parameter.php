<?php

namespace Solution\RstBuilder\Element\Method;

class Parameter implements ParameterInterface
{
    protected $name;

    protected $type;

    protected $desc;

    protected $required;

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
}
