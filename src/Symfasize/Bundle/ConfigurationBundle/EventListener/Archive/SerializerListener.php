<?php

namespace Symfasize\Bundle\ConfigurationBundle\EventListener\Archive;

use Symfasize\Bundle\ConfigurationBundle\Event\ArchiveEvent;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerListener
{
    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param ArchiveEvent $event
     */
    public function onArchive(ArchiveEvent $event)
    {
        $content = $this->serializer->serialize(
            $event->getConfiguration(),
            'json',
            array('json_encode_options' => JSON_PRETTY_PRINT)
        );

        $event->getArchive()->addFile('symfasize/symfasize.json', $content);
    }
} 
