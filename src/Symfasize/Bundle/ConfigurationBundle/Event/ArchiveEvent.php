<?php

namespace Symfasize\Bundle\ConfigurationBundle\Event;

use Symfasize\Bundle\ConfigurationBundle\Archive\Archive;
use Symfasize\Model\Configuration;
use Symfony\Component\EventDispatcher\Event;

class ArchiveEvent extends Event
{

    /**
     * @var Archive
     */
    private $archive;

    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @param Archive $archive
     * @param Configuration $configuration
     */
    public function __construct(Archive $archive, Configuration $configuration)
    {
        $this->archive = $archive;
        $this->configuration = $configuration;
    }

    /**
     * @return Archive
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * @return Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }
}
