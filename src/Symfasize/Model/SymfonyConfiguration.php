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
     * @param array  $bundles
     * @param string $version
     * @param bool   $removeDemoBundle
     */
    public function __construct(array $bundles, $version = null, $removeDemoBundle = false)
    {
        $this->bundles = $bundles;
        $this->version = $version;
        $this->removeDemoBundle = $removeDemoBundle;
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
}
