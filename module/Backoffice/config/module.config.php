<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Backoffice;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router'       => [
        'routes' => [
            'Backoffice rest' => [
                'type'         => Literal::class,
                'options'      => [
                    'route'    => '/backoffice/rest',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                /*'child_routes' => [
                    'type'   => Segment::class,
                    'option' => [
                        'route'       => '[/:controller][/:action]',
                        'constraints' => [
                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]',
                        ]
                    ],
                ],*/
            ],
            'Words'           => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/backoffice/rest/getwords[/:id]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'words',
                    ],
                ],
            ],
            'Langs'           => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/backoffice/rest/langs',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'langs',
                    ],
                ],
            ],
        ],
    ],
    'controllers'  => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
        ],
    ],
//    'service_manager' => [
    //        'factories' => [
    //            Service\BidsManager::class => Service\Factory\PostManagerFactory::class,
    //        ],
    //    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies'          => [
            'ViewJsonStrategy',
        ],
    ],
    'doctrine'     => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity'],
            ],
            'orm_default'             => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
    ],
];
