<?php

namespace Symfasize\Model;

class Bundle
{
    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $dir;

    /**
     * @var string
     */
    private $format;

    /**
     * @var bool
     */
    private $withStructure;

    /**
     * @param string $namespace
     * @param string $name
     * @param string $dir
     * @param string $format
     * @param bool   $withStructure
     */
    public function __construct($namespace, $name, $dir = 'src', $format = 'xml', $withStructure = true)
    {
        $this->namespace = $namespace;
        $this->name = $name;
        $this->dir = $dir;
        $this->format = $format;
        $this->withStructure = $withStructure;
    }

    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @return boolean
     */
    public function hasStructure()
    {
        return $this->withStructure;
    }
}
