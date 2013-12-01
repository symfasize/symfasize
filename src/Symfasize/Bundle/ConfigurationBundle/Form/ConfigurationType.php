<?php

namespace Symfasize\Bundle\ConfigurationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfigurationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('symfonyVersion', new TextType(), array('required' => false));
        $builder->add('projectDirectory', new TextType());
        $builder->add('removeDemoBundle', new CheckboxType(), array('required' => false));
        $builder->add('useGitCommits', new CheckboxType(), array('required' => false));
        $builder->add('generateScriptOnly', new CheckboxType(), array('required' => false));

        $builder->add('bundleConfiguration', 'bundle_configuration');
        $builder->add('bundles', 'collection', array('type' => 'bundle', 'allow_add' => true));

        $builder->add('withBundleWizard', new CheckboxType(), array('required' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Symfasize\Bundle\ConfigurationBundle\Dto\Configuration',
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
        return 'configuration';
    }
}
