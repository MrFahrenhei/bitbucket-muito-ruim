<?php

namespace ContainerIYesmDD;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_15pBYQXService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.15pBYQX' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.15pBYQX'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'customerPasswordHasher' => ['privates', 'security.user_password_hasher', 'getSecurity_UserPasswordHasherService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'serializer' => ['privates', 'App\\Service\\Serializer\\Request_Serializer', 'getRequestSerializerService', true],
        ], [
            'customerPasswordHasher' => '?',
            'entityManager' => '?',
            'serializer' => 'App\\Service\\Serializer\\Request_Serializer',
        ]);
    }
}
