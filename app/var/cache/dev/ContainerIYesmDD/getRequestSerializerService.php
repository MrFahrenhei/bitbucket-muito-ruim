<?php

namespace ContainerIYesmDD;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRequestSerializerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Service\Serializer\Request_Serializer' shared autowired service.
     *
     * @return \App\Service\Serializer\Request_Serializer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/Serializer/Request_Serializer.php';

        return $container->privates['App\\Service\\Serializer\\Request_Serializer'] = new \App\Service\Serializer\Request_Serializer();
    }
}
