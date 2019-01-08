<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

/**
 * List of enabled modules for this application.
 *
 * This should be an array of module namespaces used in the application.
 */
return [
    'Zend\Session',
	'Zend\Cache',	
    'Zend\Db',
    'Zend\Log',
    'DoctrineModule',
    'DoctrineORMModule',
    'Zend\Form',
    'Zend\Router',
    'Zend\Mail',
    'Zend\Mvc\I18n',
    'Zend\I18n',
    'Zend\Validator',
    'Zend\Mvc\Plugin\FilePrg',
    'Zend\Mvc\Plugin\FlashMessenger',
    'SwissEngine\Tools\Doctrine\Extension',
	'ZfMetal\Commons',
	'ZfMetal\Datagrid',
	'ZfMetal\Generator',
    'ZfrCors',
    'Application',
    'Backoffice'
];
