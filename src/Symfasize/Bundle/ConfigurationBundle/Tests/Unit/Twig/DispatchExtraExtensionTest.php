<?php

namespace Symfasize\Bundle\ConfigurationBundle\Tests\Unit\Archive;

use Symfasize\Bundle\ConfigurationBundle\Twig\DispatchExtension;

class DispatchExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testDispatch()
    {
        $parameters = array('foo' => 'bar');
        $eventName = 'naz.gul';

        $event = $this->getMockBuilder('Symfasize\Bundle\ConfigurationBundle\Event\RenderEvent')
            ->disableOriginalConstructor()
            ->setMethods(array('getContent'))
            ->getMock();

        $event->expects($this->once())
            ->method('getContent')
            ->will($this->returnValue('hello world'));

        $eventBuilder = $this->getMockBuilder('Symfasize\Bundle\ConfigurationBundle\Event\RenderEventBuilder')
            ->setMethods(array('build'))
            ->getMock();

        $eventBuilder->expects($this->once())
            ->method('build')
            ->will(
                $this->returnCallback(
                    function () use ($event) {
                        return $event;
                    }
                )
            );

        $eventDispatcher = $this->getMockBuilder('Symfony\Component\EventDispatcher\EventDispatcherInterface')
            ->getMockForAbstractClass();

        $eventDispatcher->expects($this->once())
            ->method('dispatch')
            ->with($this->equalTo($eventName), $this->equalTo($event));

        $ext = new DispatchExtension($eventDispatcher, $eventBuilder);
        $result = $ext->dispatch($eventName, $parameters);

        $this->assertEquals('hello world', $result);
    }
}
