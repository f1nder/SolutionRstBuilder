<?php

namespace Solution\RstBuilder\Element;

class Paragraph implements ElementInterface
{

    protected $text;

    public function __construct($text = null)
    {
        $this->text = $text;
    }

    /**
     * Get Text
     *
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set Text
     *
     * @param mixed $text
     *
     * @return Paragraph
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $template = <<<EOT

%s

EOT;

        return sprintf($template, $this->text);
    }
}
