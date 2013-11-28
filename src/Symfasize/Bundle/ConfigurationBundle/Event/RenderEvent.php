<?php

namespace Symfasize\Bundle\ConfigurationBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class RenderEvent extends Event
{
    private $content = '';

    /**
     * @param RenderContext $context
     */
    public function __construct(RenderContext $context)
    {
        $this->context = $context;
    }

    /**
     * @param string $content
     */
    public function addContentLine($content)
    {
        $this->content .= $content . PHP_EOL;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get a parameter from context
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->context->get($key, $default);
    }
}
