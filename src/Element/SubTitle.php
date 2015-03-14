<?php

namespace Solution\RstBuilder\Element;

class SubTitle extends Title
{
    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $template = <<<EOT
%s
%s
EOT;

        $line = str_repeat('-', strlen($this->title));

        return sprintf($template, $this->title, $line);
    }
}
