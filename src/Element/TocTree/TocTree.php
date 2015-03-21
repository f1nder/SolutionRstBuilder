<?php

namespace Solution\RstBuilder\Element\TocTree;

use Solution\RstBuilder\Element\ElementInterface;

/**
 * Class TocTree
 * @package Solution\RstBuilder\Element\TocTree
 */
class TocTree implements ElementInterface
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $entries = [];

    /**
     * @param Option $option
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
            $this->glueElements($this->getOptions(), PHP_EOL, str_repeat(' ', 3)),
            $this->glueElements($this->getEntries(), PHP_EOL, str_repeat(' ', 3))
        );
    }


    /**
     * @param $elements
     * @param $glue
     * @param null $prefix
     * @param null $suffix
     *
     * @return string
     */
    private function glueElements($elements, $glue, $prefix = null, $suffix = null)
    {
        $renderedElements = array_map(
            function (ElementInterface $element) use ($prefix, $suffix) {
                return $prefix . $element->render() . $suffix;
            },
            $elements
        );

        return implode($glue, $renderedElements);
    }
}
