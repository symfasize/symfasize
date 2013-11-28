<?php

namespace Symfasize\Bundle\ConfigurationBundle\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class Bundle
{
    /**
     * @Assert\NotBlank(message="bundle.namespace.not_blank")
     * @Assert\Regex(pattern="/^\w+\/([\w\/]*)\w+Bundle$/", message="bundle.regex.namespace")
     *
     * @var string
     */
    private $namespace;

    /**
     * @Assert\NotBlank(message="bundle.name.not_blank")
     * @Assert\Regex(pattern="/^\w+Bundle$/", message="bundle.regex.name")
     *
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getId()
    {
        // otherwise form workflow will break with "/"
        return str_replace('/', '_', $this->namespace . ':' . $this->name);
    }

    /**
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     *
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
