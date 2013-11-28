<?php

namespace Symfasize\Bundle\ConfigurationBundle\Archive;

use Symfasize\Model\Configuration;
use Symfasize\Bundle\ConfigurationBundle\Event\ArchiveEvent;
use Symfasize\Bundle\ConfigurationBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ArchiveBuilder
{
    /**
     * @var Archive
     */
    private $archive;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param Archive                  $archive
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(Archive $archive, EventDispatcherInterface $eventDispatcher)
    {
        $this->archive = $archive;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param Configuration $configuration
     *
     * @return Archive
     */
    public function build(Configuration $configuration)
    {
        // building the archive via events
        $event = new ArchiveEvent($this->archive, $configuration);
        $this->eventDispatcher->dispatch(Events::SYMFASIZE_ARCHIVE, $event);

        // nothing more to be done, just returning the build archive
        return $this->archive;
    }
}
