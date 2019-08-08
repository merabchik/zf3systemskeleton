<?php
namespace Users\Controller\Factory;

use Interop\Container\ContainerInterface;
use Users\Controller\AuthController;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class AuthControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,
        $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        // Instantiate the controller and inject dependencies
        return new AuthController($entityManager);
    }
}
