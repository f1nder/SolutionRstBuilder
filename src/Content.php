<?php

namespace Solution\RstBuilder;

use Solution\RstBuilder\Element\ElementInterface;
use Solution\RstBuilder\Element\LineBreak;

class Content
{
    /**
     * Rst elements
     *
     * @var array
     */
    protected $elements = [];

    public function addElement(ElementInterface $element, $lineBreaks = 0)
    {
        $this->elements[] = $element;
        if ($lineBreaks) {
            $this->elements[] = new LineBreak($lineBreaks);
        }

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
