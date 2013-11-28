<?php

namespace Symfasize\Bundle\ConfigurationBundle\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class BundleConfiguration
{
    /**
     * @Assert\NotBlank(message="bundle_configuration.dir.not_blank")
     *
     * @var string
     */
    private $dir = 'src';

    /**
     * @Assert\NotBlank(message="bundle_configuration.format.not_blank")
     *
     * @var string
     */
    private $format = 'xml';

    /**
     * @Assert\Type(type="bool")
     *
     * @var bool
     */
    private $withStructure = false;

    /**
     * @param string $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    /**
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param boolean $withStructure
     */
    public function setWithStructure($withStructure)
    {
        $this->withStructure = $withStructure;
    }

    /**
     * @return boolean
     */
    public function getWithStructure()
    {
        return $this->withStructure;
    }
}
