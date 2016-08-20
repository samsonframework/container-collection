<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.07.2016
 * Time: 21:38.
 */
namespace samsonframework\containercollection;

use samsonframework\container\configurator\PropertyConfiguratorInterface;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\container\resolver\PropertyResolverTrait;

/**
 * Collection property resolver class.
 *
 * @author Vitaly Iegorov <egorov@samsonos.com>
 */
class CollectionPropertyResolver extends AbstractCollectionResolver implements CollectionResolverInterface
{
    use PropertyResolverTrait;

    /** Collection property key */
    const KEY = 'properties';

    /**
     * {@inheritDoc}
     */
    public function resolve(array $configurationArray, ClassMetadata $classMetadata)
    {
        // Iterate collection
        if (array_key_exists(self::KEY, $configurationArray)) {
            $reflectionClass = new \ReflectionClass($classMetadata->className);

            // Iterate configured properties
            foreach ($configurationArray[self::KEY] as $propertyName => $propertyDataArray) {
                $propertyMetadata = $this->resolvePropertyMetadata(
                    $reflectionClass->getProperty($propertyName),
                    $classMetadata
                );

                // Process attributes
                foreach ($this->getAttributeConfigurator($propertyDataArray) as $configurator) {
                    /** @var PropertyConfiguratorInterface $configurator Parse property metadata */
                    $configurator->toPropertyMetadata($propertyMetadata);
                }
            }
        }

        return $classMetadata;
    }
}
