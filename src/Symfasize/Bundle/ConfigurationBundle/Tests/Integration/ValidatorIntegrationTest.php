<?php

namespace Symfasize\Bundle\ConfigurationBundle\Tests\Integration;

use Symfony\Component\Validator\Validator;
use Symfony\Component\Validator\ValidatorBuilder;

abstract class ValidatorIntegrationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Validator
     */
    protected $validator;

    protected function setUp()
    {
        $builder = new ValidatorBuilder();

        $builder->enableAnnotationMapping();
        $this->validator = $builder->getValidator();
    }

    protected function validate($value, $groups = null, $traverse = false, $deep = false)
    {
        return $this->validator->validate($value);
    }

    protected function assertValid($value)
    {
        $validations = $this->validate($value);
        $this->assertCount(0, $validations, 'Violation list is not empty');
    }

    protected function assertValidProperty($containingValue, $property, $groups = null)
    {
        $validations = $this->validator->validateProperty($containingValue, $property, $groups);
        $this->assertCount(0, $validations, 'Violation list is not empty for property');
    }

    protected function assertNotValidProperty($containingValue, $property, $groups = null)
    {
        $validations = $this->validator->validateProperty($containingValue, $property, $groups);
        $this->assertTrue(count($validations) > 0, 'property seems to be valid');
    }
} 
