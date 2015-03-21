<?php

namespace Solution\RstBuilder\Element\TocTree;

use Solution\RstBuilder\Element\ElementInterface;

class Entry implements ElementInterface
{
    protected $title;

    protected $target;

    /**
     * Get Title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set Title
     *
     * @param mixed $title
     *
     * @return Entry
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get Target
     *
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set Target
     *
     * @param mixed $target
     *
     * @return Entry
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Render element to a string
     *
     * @return string
     */
    public function render()
    {
        if ($this->getTitle()) {
            return sprintf('%s <%s>', $this->getTitle(), $this->getTarget());
        }

        return $this->getTarget();
    }
}
