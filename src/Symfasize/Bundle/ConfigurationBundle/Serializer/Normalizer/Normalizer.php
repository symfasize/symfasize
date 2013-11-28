<?php

namespace Symfasize\Bundle\ConfigurationBundle\Serializer\Normalizer;

use Symfasize\Model\Bundle;
use Symfasize\Model\Configuration;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class Normalizer implements NormalizerInterface
{

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = array())
    {
        /**@var $object Configuration */
        $normalized = array(
            'symfony-version'    => $object->getSymfonyConfiguration()->getVersion(),
            'project-directory'  => $object->getProjectConfiguration()->getProjectDirectory(),
            'remove-demo-bundle' => $object->getSymfonyConfiguration()->shouldRemoveDemoBundle(),
            'use-git-commits'    => $object->getProjectConfiguration()->shouldUseGitCommits(),
            'bundles'            => array()
        );

        foreach ($object->getSymfonyConfiguration()->getBundles() as $bundle) {
            $normalized['bundles'][] = $this->normalizeBundle($bundle);
        }

        return $normalized;
    }

    private function normalizeBundle(Bundle $bundle)
    {
        return array(
            'namespace'      => $bundle->getNamespace(),
            'name'           => $bundle->getName(),
            'dir'            => $bundle->getDir(),
            'format'         => $bundle->getFormat(),
            'with-structure' => $bundle->hasStructure(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return ($data instanceof Configuration);
    }
}
