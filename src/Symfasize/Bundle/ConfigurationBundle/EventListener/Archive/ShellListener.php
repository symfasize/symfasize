<?php

namespace Symfasize\Bundle\ConfigurationBundle\EventListener\Archive;

use Symfasize\Bundle\ConfigurationBundle\Event\ArchiveEvent;
use Symfasize\Bundle\ConfigurationBundle\Template\TemplateInterface;

class ShellListener
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    public function onArchive(ArchiveEvent $event)
    {
        $content = $this->template->render(array('configuration' => $event->getConfiguration()));

        $event->getArchive()->addFile('symfasize/symfasize.sh', $content);
    }
} 
