<?php

namespace Symfasize\Model;

class SymfonyConfiguration
{
    /**
     * @var array
     */
    protected $bundles = array();

    /**
     * @var string
     */
    protected $version;

    /**
     * @var bool
     */
    protected $removeDemoBundle;

    /**
     * @var bool
     */
    protected $installBundleWizard;

    /**
     * @param array  $bundles
     * @param string $version
     * @param bool   $removeDemoBundle
     * @param bool   $installBundleWizard
     */
    public function __construct(array $bundles, $version = null, $removeDemoBundle = false, $installBundleWizard = true)
    {
        $this->bundles = $bundles;
        $this->version = $version;
        $this->removeDemoBundle = $removeDemoBundle;
        $this->installBundleWizard = $installBundleWizard;
    }

    /**
     * @return array
     */
    public function getBundles()
    {
        return $this->bundles;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return bool
     */
    public function shouldRemoveDemoBundle()
    {
        return $this->removeDemoBundle;
    }

    /**
     * @return bool
     */
    public function shouldInstallBundleWizard()
    {
        return $this->installBundleWizard;
    }
}
