<?php

namespace Symfasize\Bundle\ConfigurationBundle\Tests\Integration;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

abstract class ContainerIntegrationTest extends \PHPUnit_Framework_TestCase
{
    protected static $class;

    /**
     * @var KernelInterface
     */
    protected static $kernel;

    /**
     * @var ContainerInterface
     */
    protected $container;

    protected function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();

        $this->container = static::$kernel->getContainer();
    }

    /**
     * @param array $options
     *
     * @return KernelInterface A KernelInterface instance
     */
    protected static function createKernel(array $options = array())
    {
        if (null === static::$class) {
            static::$class = static::getKernelClass();
        }

        return new static::$class(
            isset($options['environment']) ? $options['environment'] : 'dev',
            isset($options['debug']) ? $options['debug'] : true
        );
    }

    protected static function getKernelClass()
    {
        require_once __DIR__.'/../../../../../../app/AppKernel.php';

        return 'AppKernel';
    }

    /**
     * Shuts the kernel down if it was used in the test.
     */
    protected function tearDown()
    {
        if (null !== static::$kernel) {
            static::$kernel->shutdown();
        }
    }
} 
