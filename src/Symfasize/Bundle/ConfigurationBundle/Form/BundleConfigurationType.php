<?php

namespace Symfasize\Bundle\ConfigurationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BundleConfigurationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dir', new TextType());
        $builder->add(
            'format',
            'choice',
            array(
                'choices' => array('yml' => 'yml', 'xml' => 'xml', 'php' => 'php', 'annotation' => 'annotation')
            )
        );
        $builder->add('withStructure', new CheckboxType(), array('required' => false));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Symfasize\Bundle\ConfigurationBundle\Dto\BundleConfiguration',
            )
        );
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'bundle_configuration';
    }
}
