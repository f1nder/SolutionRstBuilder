<?php

namespace Solution\RstBuilder\Element;

use Solution\RstBuilder\Element\Support\OptionSupport;

class CodeBlock implements ElementInterface
{
    use OptionSupport, CommonHelper;

    protected $type;

    protected $content;

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
     * @return CodeBlock
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get Content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set Content
     *
     * @param mixed $content
     *
     * @return CodeBlock
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Render element to a string
     *
     * @return string
     */
    public function render()
    {
        $template = <<<EOT
.. code-block:: %s
%s

%s
EOT;

        return sprintf(
            $template,
            $this->getType(),
            $this->glueElements(
                $this->getOptions(),
                function (ElementInterface $element) {
                    return $element->render();
                },
                PHP_EOL,
                str_repeat(' ', 3)
            ),
            $this->addSpacesForEveryLine($this->getContent(), 3)
    );
    }
}
