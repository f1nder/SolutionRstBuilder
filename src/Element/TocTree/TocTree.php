<?php

namespace Solution\RstBuilder\Element\TocTree;

use Solution\RstBuilder\Element\CommonHelper;
use Solution\RstBuilder\Element\ElementInterface;
use Solution\RstBuilder\Element\Option;

/**
 * Class TocTree
 * @package Solution\RstBuilder\Element\TocTree
 */
class TocTree implements ElementInterface
{
    use CommonHelper;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $entries = [];

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
     * @param Entry $entry
     */
    public function addEntry(Entry $entry)
    {
        $this->entries[] = $entry;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return array
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * Render element to a string
     *
     * @return string
     */
    public function render()
    {
        $template = <<<EOT
.. toctree::
%s

%s
EOT;

        return sprintf(
            $template,
            $this->glueElements(
                $this->getOptions(),
                function (ElementInterface $element) {
                    return $element->render();
                },
                PHP_EOL,
                str_repeat(' ', 3)
            ),
            $this->glueElements(
                $this->getEntries(),
                function (ElementInterface $element) {
                    return $element->render();
                },
                PHP_EOL,
                str_repeat(' ', 3)
            )
        );
    }

}
