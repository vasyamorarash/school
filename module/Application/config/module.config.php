<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'doctrine' => array(
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Application\Entity\Users',
                'identity_property' => 'login',
                'credential_property' => 'password',
            ),
        ),

        'driver' => array(
            'application_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities'
                )
            )
        )
    ),
    'router' => array(
        'routes' => array(
            'site' => array(
                'type' => 'hostname',
                'options' => array(
                    //set route hostname locally
                    'route' => 'school.dev',
                    'constraints' => array(
                        'subdomain' => ''
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // Site section
                    'home' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '/[:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Application\Controller\Index',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'institutions' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/institutions[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Application\Controller\Institutions',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'users' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/users[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Application\Controller\Users',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'institution-type' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/institution-type[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Application\Controller\InstitutionType',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            'api-site' => array(
                'type' => 'hostname',
                'options' => array(
                    //set route hostname locally
                    'route' => '[:subdomain].school.dev',
                    'constraints' => array(
                        'subdomain' => '[a-z][a-z0-9]*'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // Site section
                    'home' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '/[:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'School\Controller\Index',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Institutions' => 'Application\Controller\InstitutionsController',
            'Application\Controller\InstitutionType' => 'Application\Controller\InstitutionTypeController',
            'Application\Controller\Users' => 'Application\Controller\UsersController',
            'School\Controller\Index' => 'School\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'menuHelper' => 'Application\View\Helper\MenuHelper',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
