<?php

namespace Symfasize\Bundle\ConfigurationBundle\Tests\Unit\Archive;

use Symfasize\Bundle\ConfigurationBundle\Twig\TextExtraExtension;

class TextExtraExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providePurifyData
     */
    public function testPurify($raw, $expected)
    {
        $ext = new TextExtraExtension();
        $this->assertEquals($expected, $ext->purify($raw));
    }

    public function providePurifyData()
    {
        return array(
            array('%CODE%foo bar', '<code>foo bar'),
            array('foo bar%END_CODE%', 'foo bar</code>'),
            array('%CODE%foo bar%END_CODE%', '<code>foo bar</code>')
        );
    }

    /**
     * @dataProvider provideLinkData
     */
    public function testLink($name, $options, $expected)
    {
        $ext = new TextExtraExtension();
        $this->assertEquals($expected, $ext->link($name, $options));
    }

    public function provideLinkData()
    {
        return array(
            array('foo', array('href' => 'bar'), '<a href="bar">foo</a>'),
            array('foo', array(), '<a href="foo">foo</a>')
        );
    }
}
