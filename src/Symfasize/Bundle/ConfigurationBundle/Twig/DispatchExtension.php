<?php


namespace Symfasize\Bundle\ConfigurationBundle\Twig;


use Symfasize\Bundle\ConfigurationBundle\Event\RenderContext;
use Symfasize\Bundle\ConfigurationBundle\Event\RenderEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DispatchExtension extends \Twig_Extension
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
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
        $event = new RenderEvent(new RenderContext($contextParameters));

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
