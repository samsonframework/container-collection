<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 07.08.16 at 13:38
 */
namespace samsonframework\containercollection\collection;

use samsonframework\container\metadata\AbstractMetadata;
use samsonframework\container\metadata\ClassMetadata;

/**
 * Collection class configurators resolving interface.
 *
 * @author Vitaly Iegorov <egorov@samsonos.com>
 */
interface CollectionResolverInterface
{
    /**
     * Resolve collection.
     *
     * @param array         $configurationArray
     * @param ClassMetadata $classMetadata
     *
     * @return AbstractMetadata
     */
    public function resolve(array $configurationArray, ClassMetadata $classMetadata);
}
