<?php

namespace Symfasize\Bundle\ConfigurationBundle\Tests\Unit\Archive;

use Symfasize\Bundle\ConfigurationBundle\Archive\Archive;

class ArchiveTest extends \PHPUnit_Framework_TestCase
{
    public function testAddingFiles()
    {
        $expected = array(
            'foo/bar/file.ext' => 'bar',
            'hello' => 'world'
        );

        $archive = new Archive();
        $archive->addFile('foo/bar/file.ext', 'bar');
        $archive->addFile('hello', 'world');

        $this->assertEquals($expected, $archive->getFiles());
    }
}
