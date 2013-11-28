<?php

namespace Symfasize\Bundle\ConfigurationBundle\Template;

interface TemplateInterface
{
    /**
     * @param array $parameters
     *
     * @return string
     */
    public function render(array $parameters = array());
} 
