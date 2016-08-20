<?php declare(strict_types = 1);
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>.
 * on 20.08.16 at 14:16
 */
namespace samsonframework\containercollection\tests\collection;

use samsonframework\containercollection\attribute\Service;
use samsonframework\containercollection\CollectionMethodResolver;
use samsonframework\containercollection\CollectionParameterResolver;
use samsonframework\container\metadata\ClassMetadata;
use samsonframework\containercollection\tests\classes\FastDriver;
use samsonframework\containercollection\tests\TestCase;

/**
 * CollectionMethodResolver test class.
 *
 * @author  Vitaly Egorov <egorov@samsonos.com>
 */
class CollectionMethodResolverTest extends TestCase
{
    public function testResolve()
    {
        $methodName = 'stopCar';
        $serviceName = 'TestService';
        $classMetadata = new ClassMetadata();
        $classMetadata->className = FastDriver::class;

        $resolver = new CollectionMethodResolver(
            [$this->createMock(Service::class)],
            $this->createMock(CollectionParameterResolver::class)
        );

        $classMetadata = $resolver->resolve([
            CollectionMethodResolver::KEY => [
                $methodName => []
            ]
        ], $classMetadata);

        static::assertArrayHasKey($methodName, $classMetadata->methodsMetadata);
    }
}
