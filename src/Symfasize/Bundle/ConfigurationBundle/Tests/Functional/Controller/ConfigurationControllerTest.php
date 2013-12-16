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

    public function testGenerate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $formNode = $crawler->selectButton('Bootstrap My Symfony2 Project');

        $form = $formNode->form();

        $client->submit($form, array());

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertEquals('attachment; filename="symfasize.sh"', $client->getResponse()->headers->get('Content-Disposition'));
        $this->assertEquals('text/plain; charset=UTF-8', $client->getResponse()->headers->get('Content-Type'));

        $this->assertContains('bin/bash', $client->getResponse()->getContent());
    }
}
