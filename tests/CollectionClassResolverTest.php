<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 20.08.16 at 14:16
 */
namespace samsonframework\containercollection\tests\collection;

use samsonframework\containercollection\attribute\Service;
use samsonframework\containercollection\CollectionClassResolver;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\containercollection\tests\TestCase;

/**
 * CollectionClassResolver test class.
 *
 * @author  Vitaly Egorov <egorov@samsonos.com>
 */
class CollectionClassResolverTest extends TestCase
{
    public function testResolve()
    {
        $serviceName = 'TestService';
        $resolver = new CollectionClassResolver([Service::class]);

        $classMetadata = $resolver->resolve(['@attributes' => [Service::KEY => $serviceName]], new ClassMetadata());

        static::assertEquals($serviceName, $classMetadata->name);
    }
}
