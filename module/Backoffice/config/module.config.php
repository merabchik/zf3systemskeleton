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
use Zend\Router\Http\Regex;

return [
    'router'       => [
        'routes' => [
            'Backoffice rest' => [
                'type'         => Literal::class,
                'options'      => [
                    'route'    => '/backoffice/rest',
                    'verb' => 'get',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                'child_routes' => [
                    'Langs'   => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/langs',
                            'verb' => 'get',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action'     => 'langs',
                            ],
                        ],
                    ],
                    'Words'   => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/langs/getwords[/:id]',
                            'verb' => 'get',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action'     => 'words',
                            ],
                        ],
                    ],
                    'Set Word'   => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/langs/setword',
                            'verb' => 'post,put',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action'     => 'setword',
                                'lang_id' => '[0-9]*'
                            ],
                        ],
                    ],
                    'doc' => [
                        'type' => Regex::class,
                        'options' => [
                            'regex'    => '/doc(?<page>\/[a-zA-Z0-9_\-]+)\.html',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action'     => 'doc',
                            ],
                            'spec'=>'/doc/%page%.html'
                        ],
                    ],
                    /*'Default' => [
                        'type'   => Segment::class,
                        'option' => [
                            'route'       => '[/:controller][/:action]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]',
                            ],
                        ],
                    ],*/
                ],
            ],
            'Backoffice rest Defaults' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/rest[/:controller[/:action]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*',
                    ],
                    'defaults' => [
                        'controller'    => Controller\RoleController::class,
                        'action'        => 'index',
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
