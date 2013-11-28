<?php

namespace Symfasize\Bundle\ConfigurationBundle\Event;

/**
 * Better accessor for array parameters
 */
class RenderContext
{
    /**
     * @var array
     */
    private $parameters;

    public function __construct(array $parameters = array())
    {
        $this->parameters = $parameters;
    }

    /**
     * @param string $key
     * @param string $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }
} 
