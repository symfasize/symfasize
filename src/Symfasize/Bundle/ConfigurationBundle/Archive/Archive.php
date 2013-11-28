<?php

namespace Symfasize\Bundle\ConfigurationBundle\Archive;

class Archive
{
    private $files = array();
    private $filename;

    public function __construct($filename = 'symfasize.zip')
    {
        $this->filename = $filename;
    }

    /**
     * @param string $path
     * @param string $content
     */
    public function addFile($path, $content)
    {
        $this->files[$path] = $content;
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->filename;
    }
}
