<?php

namespace Symfasize\Bundle\ConfigurationBundle\Tests\Integration\Dto;

use Symfasize\Bundle\ConfigurationBundle\Dto\Bundle;
use Symfasize\Bundle\ConfigurationBundle\Tests\Integration\ValidatorIntegrationTest;

class BundleTest extends ValidatorIntegrationTest
{
    /**
     * @dataProvider provideValidNamespaces
     */
    public function testValidNamespace($namespace)
    {
        $bundle = new Bundle();
        $bundle->setNamespace($namespace);

        $this->assertValidProperty($bundle, 'namespace');
    }

    public function provideValidNamespaces()
    {
        return array(
            array('Acme/Bundle/MyBundle'),
            array('Acme/MyBundle')
        );
    }

    /**
     * @dataProvider provideInvalidNamespaces
     */
    public function testInvalidNamespace($namespace)
    {
        $bundle = new Bundle();
        $bundle->setNamespace($namespace);

        $this->assertNotValidProperty($bundle, 'namespace');
    }

    public function provideInvalidNamespaces()
    {
        return array(
            array('Acme/ Bundle/MyBundle'),
            array('Acme/My')
        );
    }
} 
