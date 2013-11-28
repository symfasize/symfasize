<?php

namespace Symfasize\Bundle\ConfigurationBundle\Archive;

class ArchiveDumper
{
    /**
     * @var FilenameGenerator
     */
    private $generator;

    /**
     * @param FilenameGenerator $generator
     * @param string            $dumpDirectory
     */
    public function __construct(FilenameGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @param Archive $archive
     *
     * @return string
     */
    public function dump(Archive $archive)
    {
        $file = $this->generator->generate();

        $zip = new \ZipArchive;
        $zip->open($file, \ZipArchive::CREATE);
        foreach ($archive->getFiles() as $path => $content) {
            $zip->addFromString($path, $content);
        }
        $zip->close();

        return file_get_contents($file);
    }
}
