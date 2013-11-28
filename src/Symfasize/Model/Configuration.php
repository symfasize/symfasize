<?php

namespace Symfasize\Model;

class Configuration
{
    /**
     * @var ProjectConfiguration
     */
    protected $projectConfiguration;

    /**
     * @var SymfonyConfiguration
     */
    protected $symfonyConfiguration;

    /**
     * @param ProjectConfiguration $projectConfiguration
     * @param SymfonyConfiguration $symfonyConfiguration
     */
    public function __construct(
        ProjectConfiguration $projectConfiguration,
        SymfonyConfiguration $symfonyConfiguration
    ) {
        $this->projectConfiguration = $projectConfiguration;
        $this->symfonyConfiguration = $symfonyConfiguration;
    }

    /**
     * @return ProjectConfiguration
     */
    public function getProjectConfiguration()
    {
        return $this->projectConfiguration;
    }

    /**
     * @return SymfonyConfiguration
     */
    public function getSymfonyConfiguration()
    {
        return $this->symfonyConfiguration;
    }
}
