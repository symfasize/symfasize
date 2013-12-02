<?php

namespace Symfasize\Bundle\ConfigurationBundle\Twig;

class TextExtraExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'rreplace',
                'strtr',
                array('pre_escape' => 'html', 'is_safe' => array('html'))
            ),
            new \Twig_SimpleFilter(
                'purify',
                array($this, 'purify'),
                array('pre_escape' => 'html', 'is_safe' => array('html'))
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'link' => new \Twig_Function_Method($this, 'link', array('is_safe' => array('html'))),
        );
    }

    /**
     * Replaces pseudo html tags used in translations with the real HTML tags
     *
     * @param $string
     *
     * @return string
     */
    public function purify($string)
    {
        return strtr(
            $string,
            array(
                '%CODE%'     => '<code>',
                '%END_CODE%' => '</code>',
            )
        );
    }

    /**
     * Generates a HTML link tag
     *
     * @param string $name    the link name
     * @param array  $options link options
     *
     * @return string
     */
    public function link($name, array $options = array())
    {
        $href = isset($options['href']) ? $options['href'] : $name;

        return sprintf('<a href="%s">%s</a>', $href, $name);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'text_extra';
    }
}
