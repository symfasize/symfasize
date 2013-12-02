<?php

namespace Symfasize\Bundle\ConfigurationBundle\Event;

class RenderEventBuilder
{
    /**
     * @param array $contextParameters
     *
     * @return RenderEvent
     */
    public function build(array $contextParameters = array())
    {
        return new RenderEvent(new RenderContext($contextParameters));
    }
} 
