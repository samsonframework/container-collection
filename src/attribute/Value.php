<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27.07.2016
 * Time: 1:55.
 */
namespace samsonframework\containercollection\attribute;

use samsonframework\container\configurator\ClassConfiguratorInterface;
use samsonframework\container\configurator\ParameterConfiguratorInterface;
use samsonframework\container\configurator\PropertyConfiguratorInterface;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\container\metadata\ParameterMetadata;
use samsonframework\container\metadata\PropertyMetadata;

/**
 * Property/parameter value attribute configurator class.
 *
 * @author Vitaly Egorov <egorov@samsonos.com>
 *
 */
class Value implements PropertyConfiguratorInterface, ParameterConfiguratorInterface, AttributeConfiguratorInterface
{
    /** @var string Configurator key */
    const KEY = 'value';

    /**
     * @var string Property/Parameter value
     */
    protected $value;

    /**
     * Class collection configurator constructor.
     *
     * @param string $className Class name
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /* {@inheritDoc} */
    public function toPropertyMetadata(PropertyMetadata $propertyMetadata)
    {
        $propertyMetadata->dependency = $this->value;
    }

    /* {@inheritDoc} */
    public function toParameterMetadata(ParameterMetadata $parameterMetadata)
    {
        $parameterMetadata->dependency = $this->value;
    }
}
