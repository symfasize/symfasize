<?php

namespace Symfasize\Bundle\ConfigurationBundle\EventListener\Render;

use Symfasize\Bundle\ConfigurationBundle\Event\RenderEvent;

class GitCommitListener
{
    /**
     * @var string
     */
    private $prefix;

    /**
     * @param string $prefix the commit prefix for each message
     */
    public function __construct($prefix = '[symfasize] ')
    {
        $this->prefix = $prefix;
    }

    /**
     * @param RenderEvent $event
     */
    public function onProjectGenerate(RenderEvent $event)
    {
        $event->addContentLine('git init');
        $event->addContentLine('git add .');
        $event->addContentLine($this->buildCommitCommand('initial commit'));
    }

    /**
     * @param RenderEvent $event
     */
    public function onDemoBundleRemove(RenderEvent $event)
    {
        $event->addContentLine('git add -A');
        $event->addContentLine($this->buildCommitCommand('removed AcmeDemoBundle'));
    }

    /**
     * @param RenderEvent $event
     *
     * @return bool
     */
    public function onBundleGenerate(RenderEvent $event)
    {
        $bundle = $event->get('bundle');

        // oops, should never happen ...
        if (!$bundle) {
            return false;
        }
        $event->addContentLine('git add -A');
        $event->addContentLine($this->buildCommitCommand('added bundle ' . $bundle->getName()));
    }

    /**
     * @param string $message
     *
     * @return string
     */
    private function buildCommitCommand($message)
    {
        return sprintf('git commit -m "%s"', $this->buildMessage($message));
    }

    /**
     * @param string $messageBody
     *
     * @return string
     */
    private function buildMessage($messageBody)
    {
        return sprintf('%s%s', $this->prefix, $messageBody, $messageBody);
    }
}
