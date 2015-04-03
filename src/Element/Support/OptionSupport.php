<?php

namespace Solution\RstBuilder\Element\Support;

use Solution\RstBuilder\Element\Option;

trait OptionSupport
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param  Option $option
     * @return $this
     */
    public function addOption(Option $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}