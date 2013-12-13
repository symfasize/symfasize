<?php

namespace Symfasize\Bundle\ConfigurationBundle\Assembler;

use Symfasize\Bundle\ConfigurationBundle\Dto\Configuration as DtoConfiguration;
use Symfasize\Model\Bundle;
use Symfasize\Model\Configuration as ModelConfiguration;
use Symfasize\Model\ProjectConfiguration;
use Symfasize\Model\SymfonyConfiguration;

/**
 * Assembles Configuration DTOs to according Model instances
 */
class ConfigurationAssembler
{
    /**
     * @param DtoConfiguration $configuration
     *
     * @return ModelConfiguration
     */
    public function assemble(DtoConfiguration $dtoConfiguration)
    {
        // build project configuration
        $projectConfiguration = new ProjectConfiguration($dtoConfiguration->getProjectDirectory());

        // build bundles and their configuration
        $dtoBundleConfiguration = $dtoConfiguration->getBundleConfiguration();
        $bundles = array();

        foreach ($dtoConfiguration->getBundles() as $dtoBundle) {
            /** @var $dtoBundle \Symfasize\Model\Bundle */

            $bundles[] = new Bundle(
                $dtoBundle->getNamespace(),
                $dtoBundle->getName(),
                $dtoBundleConfiguration->getDir(),
                $dtoBundleConfiguration->getFormat(),
                $dtoBundleConfiguration->getWithStructure()
            );
        }

        // assemble rest of Symfony configuration
        $version = $dtoConfiguration->getSymfonyVersion();
        $removeDemoBundle = $dtoConfiguration->getRemoveDemoBundle();
        $installBundleWizard = $dtoConfiguration->getWithBundleWizard();
        $symfonyConfiguration = new SymfonyConfiguration(
            $bundles,
            $version,
            $removeDemoBundle,
            $installBundleWizard
        );

        return new ModelConfiguration($projectConfiguration, $symfonyConfiguration);
    }
}
