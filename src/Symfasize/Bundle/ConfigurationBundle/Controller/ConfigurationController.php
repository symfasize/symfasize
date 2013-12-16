<?php

namespace Symfasize\Bundle\ConfigurationBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfasize\Bundle\ConfigurationBundle\Dto\Bundle;
use Symfasize\Bundle\ConfigurationBundle\Dto\BundleConfiguration;
use Symfasize\Bundle\ConfigurationBundle\Dto\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ConfigurationController extends Controller
{
    /**
     * @Template
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(
            'configuration',
            $this->buildDefaultConfiguration()
        );
        $form->handleRequest($request);

        if ($form->isValid()) {
            // form contains DTOs only
            $dtoConfiguration = $form->getData();

            // assemble them to the real model
            $configuration = $this->getAssembler()->assemble($dtoConfiguration);

            $response = new Response;

            // return plain text or zip archive always as disposition
            if ($dtoConfiguration->getGenerateScriptOnly()) {

                $content = $this->getShellTemplate()->render(
                    array('configuration' => $configuration)
                );

                $filename = 'symfasize.sh';
                $response->headers->set('Content-Type', 'text/plain');
            } else {

                $archive = $this->getArchiveBuilder()->build($configuration);
                $content = $this->getArchiveDumper()->dump($archive);
                $filename = $archive->getName();
            }

            $d = $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $filename);

            $response->headers->set('Content-Disposition', $d);
            $response->setContent($content);

            return $response;
        }

        return array('form' => $form->createView());
    }

    /**
     * @return Configuration
     */
    private function buildDefaultConfiguration()
    {
        $bundleConfiguration = new BundleConfiguration();

        $bundle = new Bundle();
        $bundle->setNamespace('Acme/Bundle/MyBundle');
        $bundle->setName('AcmeMyBundle');

        $configuration = new Configuration();
        $configuration->setBundleConfiguration($bundleConfiguration);
        $configuration->addBundle($bundle);

        return $configuration;
    }

    /**
     * @return \Symfasize\Bundle\ConfigurationBundle\Assembler\ConfigurationAssembler
     */
    private function getAssembler()
    {
        return $this->get('symfasize.configuration_assembler');
    }

    /**
     * @return \Symfasize\Bundle\ConfigurationBundle\Archive\ArchiveBuilder
     */
    private function getArchiveBuilder()
    {
        return $this->get('symfasize.archive_builder');
    }

    /**
     * @return \Symfasize\Bundle\ConfigurationBundle\Archive\ArchiveDumper
     */
    private function getArchiveDumper()
    {
        return $this->get('symfasize.archive_dumper');
    }

    /**
     * @return \Symfasize\Bundle\ConfigurationBundle\Template\TemplateInterface
     */
    private function getShellTemplate()
    {
        return $this->get('symfasize.template.shell');
    }
}
