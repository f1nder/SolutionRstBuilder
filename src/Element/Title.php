<?php

namespace Solution\RstBuilder\Element;

class Title implements ElementInterface
{

    protected $title;

    public function __construct($title = null)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $template = <<<EOT
%s
%s
%s
EOT;

        $line = str_repeat('=', strlen($this->title));

        return sprintf($template, $line, $this->title, $line);
    }

}
