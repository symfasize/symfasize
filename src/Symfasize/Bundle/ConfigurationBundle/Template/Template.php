<?php

namespace Symfasize\Bundle\ConfigurationBundle\Template;

use Symfony\Component\Templating\EngineInterface;

class Template implements TemplateInterface
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var string
     */
    private $templateName;

    /**
     * @param EngineInterface $templating
     * @param string          $templateName
     */
    public function __construct(EngineInterface $templating, $templateName)
    {
        $this->templating = $templating;
        $this->templateName = $templateName;
    }

    /**
     * @param array $parameters
     *
     * @return string
     */
    public function render(array $parameters = array())
    {
        return $this->templating->render($this->templateName, $parameters);
    }
}
