<?php

namespace Symfasize\Bundle\ConfigurationBundle\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class Configuration
{
    /**
     * @var string
     */
    protected $symfonyVersion;

    /**
     * @Assert\NotBlank(message="configuration.project_directory.not_blank")
     *
     * @var string
     */
    protected $projectDirectory = '/var/www/my-project';

    /**
     * @Assert\Type(type="bool")
     *
     * @var bool
     */
    protected $removeDemoBundle = false;

    /**
     * @Assert\Type(type="bool")
     *
     * @var bool
     */
    protected $useGitCommits = false;

    /**
     * @Assert\Type(type="bool")
     *
     * @var bool
     */
    protected $generateScriptOnly = true;

    /**
     * @Assert\Valid
     *
     * @var BundleConfiguration
     */
    protected $bundleConfiguration = null;

    /**
     * @Assert\Valid
     *
     * @var array list of bundles
     */
    protected $bundles = array();

    /**
     * @param mixed $projectDirectory
     */
    public function setProjectDirectory($projectDirectory)
    {
        $this->projectDirectory = $projectDirectory;
    }

    /**
     * @return string
     */
    public function getProjectDirectory()
    {
        return $this->projectDirectory;
    }

    /**
     * @param mixed $symfonyVersion
     */
    public function setSymfonyVersion($symfonyVersion)
    {
        $this->symfonyVersion = $symfonyVersion;
    }

    /**
     * @return mixed
     */
    public function getSymfonyVersion()
    {
        return $this->symfonyVersion;
    }

    /**
     * @param bool $flag
     */
    public function setRemoveDemoBundle($flag)
    {
        $this->removeDemoBundle = $flag;
    }

    /**
     * @return bool
     */
    public function getRemoveDemoBundle()
    {
        return $this->removeDemoBundle;
    }

    /**
     * @param boolean $useGitCommits
     */
    public function setUseGitCommits($useGitCommits)
    {
        $this->useGitCommits = $useGitCommits;
    }

    /**
     * @return boolean
     */
    public function getUseGitCommits()
    {
        return $this->useGitCommits;
    }

    /**
     * @param BundleConfiguration $bundleConfiguration
     */
    public function setBundleConfiguration(BundleConfiguration $bundleConfiguration)
    {
        $this->bundleConfiguration = $bundleConfiguration;
    }

    /**
     * @return BundleConfiguration
     */
    public function getBundleConfiguration()
    {
        return $this->bundleConfiguration;
    }

    /**
     * @param Bundle $bundle
     */
    public function addBundle(Bundle $bundle)
    {
        $this->bundles[$bundle->getId()] = $bundle;
    }

    public function removeBundle(Bundle $bundle)
    {
        if (array_key_exists($bundle->getId(), $this->bundles)) {
            unset($this->bundles[$bundle->getId()]);
        }
    }

    /**
     * @return array
     */
    public function getBundles()
    {
        return $this->bundles;
    }

    /**
     * @param bool $generateScriptOnly
     */
    public function setGenerateScriptOnly($generateScriptOnly)
    {
        $this->generateScriptOnly = $generateScriptOnly;
    }

    /**
     * @return bool
     */
    public function getGenerateScriptOnly()
    {
        return $this->generateScriptOnly;
    }
}
