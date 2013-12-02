<?php

namespace Symfasize\Bundle\ConfigurationBundle\Twig;

use Symfasize\Bundle\ConfigurationBundle\Event\RenderEventBuilder;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DispatchExtension extends \Twig_Extension
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var RenderEventBuilder
     */
    private $eventBuilder;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     * @param RenderEventBuilder       $eventBuilder
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, RenderEventBuilder $eventBuilder)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->eventBuilder = $eventBuilder;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            'dispatch' => new \Twig_Function_Method($this, 'dispatch', array('is_safe' => array('html'))),
        );
    }

    /**
     * @param string $eventName
     * @param array  $contextParameters
     *
     * @return string
     */
    public function dispatch($eventName, array $contextParameters = array())
    {
        $event = $this->eventBuilder->build($contextParameters);

        $this->eventDispatcher->dispatch($eventName, $event);

        return $event->getContent();
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'dispatch';
    }
}
