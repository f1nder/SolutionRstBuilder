<?php

namespace Solution\RstBuilder\Element;

trait CommonHelper
{
    /**
     * @param $elements
     * @param $glue
     * @param null $prefix
     * @param null $suffix
     *
     * @return string
     */
    protected function glueElements($elements, \Closure $callback, $glue, $prefix = null, $suffix = null)
    {
        $renderedElements = array_map(
            function ($element) use ($callback, $prefix, $suffix) {
                return $prefix . $callback($element) . $suffix;
            },
            $elements
        );

        return implode($glue, $renderedElements);
    }

    protected function  addSpacesForEveryLine($content, $n = 1)
    {
        $lines = explode(PHP_EOL, $content);

        return $this->glueElements(
            $lines,
            function ($e) {
                return $e;
            },
            '',
            str_repeat(' ', $n),
            PHP_EOL
        );
    }
}