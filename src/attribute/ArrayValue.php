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
 * Property/parameter array value attribute configurator class.
 *
 * @author Vitaly Egorov <egorov@samsonos.com>
 *
 */
class ArrayValue implements PropertyConfiguratorInterface, ParameterConfiguratorInterface, AttributeConfiguratorInterface
{
    /** @var string Configurator key */
    const KEY = 'array';

    /**
     * @var string Property/Parameter array value
     */
    protected $value = [];

    /**
     * Class collection configurator constructor.
     *
     * @param string $value Property/Parameter array value
     */
    public function __construct(string $value)
    {
        foreach (explode(',', trim($value)) as $item) {
            list($itemKey, $itemValue) = explode('=>', $item);
            $this->value[trim($itemKey)] = trim($itemValue);
        }
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
