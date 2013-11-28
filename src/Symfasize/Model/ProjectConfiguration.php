<?php

namespace Symfasize\Model;

class ProjectConfiguration
{
    /**
     * @var string
     */
    protected $projectDirectory;

    /**
     * @var bool
     */
    protected $useGitCommits;

    /**
     * @param string $projectDirectory
     * @param bool $useGitCommits
     */
    public function __construct($projectDirectory, $useGitCommits = false)
    {
        $this->projectDirectory = $projectDirectory;
        $this->useGitCommits = $useGitCommits;
    }

    /**
     * @return string
     */
    public function getProjectDirectory()
    {
        return $this->projectDirectory;
    }

    /**
     * @return string
     */
    public function getParentDirectory()
    {
        return dirname($this->projectDirectory);
    }

    /**
     * @return bool
     */
    public function shouldUseGitCommits()
    {
        return $this->useGitCommits;
    }
} 
