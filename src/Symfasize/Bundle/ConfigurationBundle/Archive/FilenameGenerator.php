<?php

namespace Symfasize\Bundle\ConfigurationBundle\Archive;

class FilenameGenerator
{
    public function generate()
    {
        $basename = tempnam("/tmp", "symfasize-zip-");

        return $basename . '.zip';
    }
} 
