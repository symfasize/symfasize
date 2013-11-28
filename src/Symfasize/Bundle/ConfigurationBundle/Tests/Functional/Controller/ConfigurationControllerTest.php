<?php

namespace Symfasize\Bundle\ConfigurationBundle\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConfigurationControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($crawler->filter('html:contains("Configure Your Symfony2 Project")')->count() > 0);
    }
}
