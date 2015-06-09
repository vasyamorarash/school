<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 16.04.2015
 * Time: 13:20
 */
return array(
    'guest'=> array(
        'site/home',
        'site/users',
        'site/institutions',
        'site/institution-type',
        'api-site/home',
    ),
    'admin'=> array(
   //     'site/home',
        'add-user',
        'delete-user',
    ),
    'teacher'=> array(

    ),

);
//
//return array(
//    'acl' => array(
//        'roles' => array(
//            'guest'     => null,
//            'user'      => 'guest',
//            'manager'   => 'user',
//            'admin'     => 'manager',
//        ),
//        'resources' => array(
//            'allow' => array(
//                // Application Controller
//                'Application\Controller\Index'  => array(
//                    'all' => 'guest',
//                ),
//            ),
//        ),
//    ),
//);