<?php

namespace Solution\RstBuilder;

use Solution\RstBuilder\Element\ElementInterface;

class Content
{
    /**
     * Rst elements
     *
     * @var array
     */
    protected $elements = [];

    public function addElement(ElementInterface $element)
    {
        $this->elements[] = $element;

        return $this;
    }

    public function getElements()
    {
        return $this->elements;
    }

    /**
     * Return content
     *
     * @return string
     */
    public function getContent()
    {
        $content = '';

        /** @var ElementInterface $element */
        foreach ($this->elements as $element) {
            $content .= $element->render();
        }

        return $content;
    }
}
